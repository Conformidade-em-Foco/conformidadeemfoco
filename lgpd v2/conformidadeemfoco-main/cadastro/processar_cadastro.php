<?php
ob_start();
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../includes/config.php';

// DESCARTA QUALQUER COISA IMPRESSA ATÉ AQUI
if (ob_get_length()) {
    ob_clean();
}

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('Método inválido');
    }

    // Exemplo mínimo de input
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    if (!$email || empty($senha)) {
        throw new Exception('Email ou senha ausentes');
    }

    // Se chegou aqui, devolve sucesso de teste
    $response = [
        'status'  => 'success',
        'message' => 'Chegou até o try com POST e inputs válidos'
    ];

    // LIMPA QUALQUER OUTPUT E IMPRIME JSON
    if (ob_get_length()) {
        ob_clean();
    }

    echo json_encode($response);
    exit;

} catch (Throwable $t) {
    if (ob_get_length()) {
        ob_clean();
    }
    echo json_encode([
        'status'  => 'error',
        'message' => $t->getMessage()
    ]);
    exit;
}
