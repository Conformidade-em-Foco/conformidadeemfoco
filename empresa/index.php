<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] !== 'empresa') {
    header("Location: ../login/index.php");
    exit;
}
?>

<h1>Bem-vindo ao portal da Empresa!</h1>
<a href="../login/logout.php">Sair</a>
