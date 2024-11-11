<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            background-image: url('fundo.jpeg');
            background-size: cover;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        form {
            display: flex;
            flex-direction: column;
            background-color: rgb(252, 252, 252);
            max-width: 500px;
            width: 40%;
            padding: 30px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            opacity: 85%;
            justify-content: center;
            align-items: center;
        }
        img {
            width: 150px;
            height: auto;
        }
        form input[type="text"], form input[type="password"] {
            width: 100%;
            height: 45px;
            padding-left: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        form input[type="submit"] {
            width: 100%;
            height: 50px;
            background: rgb(49, 131, 32);
            color: #FFFFFF; 
            border-radius: 20px;
        }
    </style>
</head>
<body>
    <form method="post" action="login.php">
        <img src="assets/images/logo.png" alt="Logo">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" name="acao" value="Login">
        <?php if (isset($_GET['error'])): ?>
            <p style="color: red;">Usuário ou senha incorretos.</p>
        <?php endif; ?>
    </form>
    <a href="index.html" class="button">Voltar</a>
</body>
</html>
