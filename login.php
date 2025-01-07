<?php 
include "function.php"; // Inclui a função de conexão com o banco
extract($_POST); // Extrai os valores enviados pelo formulário

if (isset($BT1)) {
    $consulta = "SELECT * FROM `cliente` WHERE `nome` = '$nome' AND 'senha' = '$senha'";
    $dados = banco("localhost", "root", NULL, "choconuts", $consulta);
        header("Location: carrinho.php");
    } else {
        $error = "Usuário ou senha incorretos!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url('./assets/images/login.jpg'); /* Substitua pelo caminho da sua imagem */
        background-size: cover;
        background-position: center;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #fff; /* Altera a cor do texto para branco para melhor contraste */
    }

    .login-container {
        background: rgba(255, 255, 255, 0.8); /* Fundo branco com 80% de opacidade */
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        box-sizing: border-box;
        backdrop-filter: blur(5px); /* Adiciona o efeito de desfoque no fundo */
    }

    .login-container img {
                width: 200px;
                height: 100px;
                margin-left: 18%;
            }

    .login-container label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }

    .login-container input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        border: none;
        border-radius: 5px;
        color: white;
        font-size: 16px;
        cursor: pointer;
    }

    .login-container input[type="submit"]:hover {
        background-color: #0056b3;
    }

    .login-container .options {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        font-size: 14px;
    }

    .login-container .options a {
        color: #007BFF;
        text-decoration: none;
    }

    .login-container .options a:hover {
        text-decoration: underline;
    }
</style>


</head>
<body>
    <div class="login-container">
        <img src="./assets/images/logo.png" alt="Choconuts logo">
        <form action="#" method="POST">
            <label for="username">Usuário</label>
            <input type="text" name="nome" placeholder="Digite seu usuário" required>

            <label for="password">Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" required>

            <input type="submit" value="Entrar" name="BT1">

            <div class="options">
                <a href="update.php" class="forgot-password">Esqueceu sua senha?</a>
                <a href="create.php" class="create-account">Criar conta</a>
            </div>
        </form>
    </div>
</body>
</html>
