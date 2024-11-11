<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $sql = "UPDATE usuarios SET nome='$nome', email='$email' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário atualizado com sucesso!";
    } else {
        echo "Erro ao atualizar o usuário: " . $conn->error;
    }
}

$conn->close();
?>
<form method="post">
    <label>ID do usuário: <input type="text" name="id" required></label>
    <label>Nome: <input type="text" name="nome" required></label>
    <label>Email: <input type="email" name="email" required></label>
    <input type="submit" value="Atualizar Usuário">
</form>
