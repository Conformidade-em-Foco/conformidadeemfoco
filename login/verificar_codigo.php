<?php
session_start();
include_once '../config/conn.php';

$email  = $_POST['email'];
$codigo = $_POST['codigo'];

// Busca o usuário com o email e código fornecidos
$stmt = $conn->prepare("SELECT id, tipo, confirmado, codigo_expiracao 
                        FROM usuarios 
                        WHERE email = ? AND codigo_confirmacao = ?");
$stmt->execute([$email, $codigo]);
$usuario = $stmt->fetch();

if ($usuario) {
    $agora = date("Y-m-d H:i:s");
    // Verifica se o código expirou
    if ($usuario['codigo_expiracao'] < $agora) {
        echo "<h3>Código expirado! Por favor, faça login novamente para gerar um novo código.</h3>";
        echo "<a href='index.php'>Voltar ao Login</a>";
        exit;
    }
    // Verifica se o código já foi utilizado (usuário já confirmado)
    if ($usuario['confirmado'] == 1) {
        echo "<h3>Este código já foi utilizado. Faça login novamente para obter um novo código.</h3>";
        echo "<a href='index.php'>Voltar ao Login</a>";
        exit;
    }

    // Código válido: atualiza status para confirmado
    $upd = $conn->prepare("UPDATE usuarios SET confirmado = 1 WHERE id = ?");
    $upd->execute([$usuario['id']]);

    // Inicia sessão do usuário
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['tipo']       = $usuario['tipo'];

    // Redireciona para o painel conforme tipo de usuário
    if ($usuario['tipo'] === 'empresa') {
        header("Location: ../empresa/index.php");
    } elseif ($usuario['tipo'] === 'dpo') {
        header("Location: ../dpo/index.php");
    } else {
        echo "Tipo de usuário inválido.";
    }
    exit;
} else {
    // Usuário não encontrado com esse email+código (código incorreto ou já alterado)
    echo "<h3>Código inválido ou e-mail incorreto!</h3>";
    echo "<a href='index.php'>Voltar</a>";
}
?>
