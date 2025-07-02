<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['tipo'] !== 'dpo') {
    header("Location: ../login/index.php");
    exit;
}
?>

<h1>Bem-vindo ao portal do DPO!</h1>
<a href="../login/logout.php">Sair</a>