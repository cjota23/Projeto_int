<?php
session_start();
include "function.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Você precisa estar logado para acessar!'); window.location.href='login.php';</script>";
    exit();}

$id_cliente = $_SESSION['id_cliente'];


if (isset($_POST['logout'])) {
    // Remove todas as variáveis de sessão
    session_unset();

    // Destroi a sessão
    session_destroy();

    // Redireciona para a página de login ou página inicial
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu do ADM</title>
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
            color: white;
            background-color:rgba(50, 50, 50, 0.74);
            border: none;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
            transition: background-color 0.3s;
        }

        .menu-button:hover {
            background-color:rgb(59, 60, 61);
        }

        .menu-button:last-child {
            background-color: #dc3545;
        }

        .menu-button:last-child:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <h1>Olá, ADM!</h1>
        <a href="Pedidos.php" class="menu-button">Gerenciar Pedidos</a>
        <a href="Produtos.php" class="menu-button">Gerenciar Produtos</a>
        <a href="Clientes.php" class="menu-button">Gerenciar Clientes</a>
        <a name="logout" class="menu-button">Sair</a>
    </div>
</body>
</html>
