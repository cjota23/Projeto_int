<?php
session_start();
include "function.php";
extract($_POST);

if (isset($_POST['BT1'])) {
    $consulta = "SELECT * FROM cliente WHERE email = '$email' AND senha = '$senha'";
    $dados = banco("localhost", "root", NULL, "choconuts", $consulta);
    $row = mysqli_fetch_assoc($dados);

    if ($row) {
        $_SESSION['loggedin'] = true;
        $_SESSION['id_cliente'] = $row['id_cliente'];
        $_SESSION['email'] = $email;
        header('Location: index.php');
        exit();
    } else {
        echo "<script>alert('Usuário ou senha incorretos!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <img src="./assets/images/logo.svg" alt="Choconuts logo">
        <form action="#" method="POST">
            <label for="username">Email</label>
            <input type="text" name="email" placeholder="Digite seu email" required>

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
