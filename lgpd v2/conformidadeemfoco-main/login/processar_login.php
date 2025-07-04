<?php
session_start();
include_once '../config/conn.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método não permitido');
    }
    
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $lembrar = isset($_POST['lembrar']) && $_POST['lembrar'] === '1';
    
    if (empty($email) || empty($senha)) {
        throw new Exception('E-mail e senha são obrigatórios');
    }
    
    // Buscar usuário em empresas
    $stmt = $conn->prepare("SELECT id, nome, email, senha, confirmado, 'empresa' as tipo 
                           FROM empresas 
                           WHERE email = ?");
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();
    
    // Se não encontrou, buscar em DPOs
    if (!$usuario) {
        $stmt = $conn->prepare("SELECT id, nome, email, senha, confirmado, 'dpo' as tipo 
                               FROM dpos 
                               WHERE email = ?");
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();
    }
    
    if (!$usuario) {
        throw new Exception('E-mail ou senha incorretos');
    }
    
    // Verificar se a conta foi confirmada
    if (!$usuario['confirmado']) {
        throw new Exception('Conta não confirmada. Verifique seu e-mail.');
    }
    
    // Verificar senha
    if (!password_verify($senha, $usuario['senha'])) {
        throw new Exception('E-mail ou senha incorretos');
    }
    
    // Login bem-sucedido - criar sessão
    $_SESSION['user_id'] = $usuario['id'];
    $_SESSION['user_name'] = $usuario['nome'];
    $_SESSION['user_email'] = $usuario['email'];
    $_SESSION['user_type'] = $usuario['tipo'];
    $_SESSION['login_time'] = time();
    
    // Atualizar último login
    $tabela = $usuario['tipo'] === 'empresa' ? 'empresas' : 'dpos';
    $stmt = $conn->prepare("UPDATE {$tabela} SET ultimo_login = NOW() WHERE id = ?");
    $stmt->execute([$usuario['id']]);
    
    // Se "lembrar de mim" estiver marcado, criar cookie
    if ($lembrar) {
        $token = bin2hex(random_bytes(32));
        $expires = time() + (30 * 24 * 60 * 60); // 30 dias
        
        // Salvar token no banco
        $stmt = $conn->prepare("UPDATE {$tabela} SET remember_token = ? WHERE id = ?");
        $stmt->execute([$token, $usuario['id']]);
        
        // Criar cookie
        setcookie('remember_token', $token, $expires, '/', '', true, true);
    }
    
    echo json_encode([
        'success' => true,
        'message' => 'Login realizado com sucesso!',
        'redirect' => '../dashboard/'
    ]);
    
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>