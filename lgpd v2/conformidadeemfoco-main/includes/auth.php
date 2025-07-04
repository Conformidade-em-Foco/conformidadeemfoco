<?php
function verificarAutenticacao($tipo_requerido = null) {
    if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
        header('Location: ../login/');
        exit;
    }
    
    if ($tipo_requerido && $_SESSION['user_type'] !== $tipo_requerido) {
        header('Location: ../login/');
        exit;
    }
    
    return true;
}

function obterUsuarioLogado($conn) {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type'])) {
        return null;
    }
    
    $tabela = $_SESSION['user_type'] === 'empresa' ? 'empresas' : 'dpos';
    $stmt = $conn->prepare("SELECT * FROM {$tabela} WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    
    return $stmt->fetch();
}

function logout() {
    session_start();
    session_destroy();
    header('Location: ../login/');
    exit;
}
?>