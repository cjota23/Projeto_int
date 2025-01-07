<?php
include 'function.php';

if (isset($BT1)) {
    $update = "UPDATE `cliente` SET `senha` = '$senha' WHERE `email` = '$email'";
    banco("localhost", "root", NULL, "confeitaria", $update);
    echo "Usuário atualizado com sucesso!";
} 
?>

<html>
    <head>
        <title>Esqueceu Sua Senha</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0 ; 
                background-size: cover;
                background-position: center;
                margin: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                color: black; 
            }

            .login-container {
                background: rgba(255, 255, 255, 0.8); 
                padding: 20px 30px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
                box-sizing: border-box;
                backdrop-filter: blur(5px); 
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
            .login-container input[type="email"],
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
                background-color: #7a7b7c;
                border: none;
                border-radius: 10px;
                color: white;
                font-size: 16px;
                cursor: pointer;
            }

            .login-container input[type="submit"]:hover {
                background-color: #d9d9d9;
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
            <img src="./assets/images/logo.png"  alt="Choconuts logo">
            <form action="" method="post" enctype="multipart/form-data">
                Nome: <input type="text" name="nome" required><br/>
                E-mail: <input type="email" name="email" required><br/>
                Nova Senha: <input type="text" name="senha" required><br/>
                <input type="submit" value="Atualizar" name="BT1"> 
            </form>
        </div>
    </body>
</html>
