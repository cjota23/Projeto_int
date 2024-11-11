<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM usuarios WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Usuário excluído com sucesso!";
    } else {
        echo "Erro ao excluir o usuário: " . $conn->error;
    }
}

$conn->close();
?>
<form method="get">
    <label>ID do usuário para excluir: <input type="text" name="id" required></label>
    <input type="submit" value="Excluir Usuário">
</form>
