<?php
// Dados de conexão com o banco
$host = "localhost";
$dbname = "lgpd_em_foco";
$user = "root"; // altere se usar outro usuário
$password = ""; // altere se tiver senha

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
    // Ativa erros PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>
