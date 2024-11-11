<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "INSERT INTO usuarios (username, password, nome, email) VALUES ('$username', '$password', '$nome', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário criado com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }
}

$conn->close();
?>
<form method="post">
    <label>Username: <input type="text" name="username" required></label>
    <label>Password: <input type="password" name="password" required></label>
    <label>Nome: <input type="text" name="nome" required></label>
    <label>Email: <input type="email" name="email" required></label>
    <input type="submit" value="Criar Usuário">
</form>
