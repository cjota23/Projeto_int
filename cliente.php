<?php
session_start();
include "function.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Você precisa estar logado para acessar o carrinho!'); window.location.href='login.php';</script>";
    exit();
}

$id_cliente = $_SESSION['id_cliente'];

if (isset($_POST['logout'])) {
    // Remove todas as variáveis de sessão
    session_unset();

    // Destroi a sessão
    session_destroy();

    // Redireciona para a página de login ou página inicial
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu do Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .menu-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 30%;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .menu-button {
            display: block;
            width: 90%;
            padding: 15px;
            margin: 10px 0;
            font-size: 18px;
            color: black;
            border: ;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }

    </style>
</head>
<body>
    <div class="menu-container">
        <h1>Olá, Cliente!</h1>
        <a href="read.php" class="menu-button">Meus Pedidos</a>
        <a href="perfil.php" class="menu-button">Meu Perfil</a>
        <a href="carrinho.php" class="menu-button">Meu Carrinho</a>
        <a href="index.php" class="menu-button">Voltar</a>
        <form method="POST">
            <button type="submit" name="logout" class="menu-button">Sair</button>
        </form>
    </div>
</body>
</html>
