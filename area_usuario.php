<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Área do Usuário</title>
</head>
<body>
    <h1>Bem-vindo à sua conta!</h1>
    <p>Aqui estão as informações de sua conta.</p>
    <a href="create.php">Criar Usuário</a> |
    <a href="read.php">Ver Usuários</a> |
    <a href="update.php">Atualizar Usuário</a> |
    <a href="delete.php">Excluir Usuário</a> |
    <a href="logout.php">Sair</a>
</body>
</html>
