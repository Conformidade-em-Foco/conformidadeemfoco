<?php
// includes/config.php

// Configurações de conexão - ajuste os valores abaixo
$host     = 'localhost';
$user     = 'seu_usuario';
$password = 'sua_senha';
$database = 'sua_base_de_dados';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$conn->set_charset('utf8mb4');
