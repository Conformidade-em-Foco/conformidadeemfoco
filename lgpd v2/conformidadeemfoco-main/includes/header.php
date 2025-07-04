<?php
// Iniciar sessão se não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Definir configurações básicas
date_default_timezone_set('America/Sao_Paulo');

// Função para sanitizar dados
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

// Verificar se usuário está logado
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Obter informações do usuário logado
function getLoggedUser() {
    if (isLoggedIn()) {
        return [
            'id' => $_SESSION['user_id'],
            'email' => $_SESSION['user_email'] ?? '',
            'tipo' => $_SESSION['user_type'] ?? '',
            'nome' => $_SESSION['user_name'] ?? ''
        ];
    }
    return null;
}

// Definir constantes da aplicação
define('APP_NAME', 'Conformidade em Foco');
define('APP_VERSION', '1.0.0');
?>