<?php 
include "function.php"; // Inclui a função de conexão com o banco
extract($_POST); // Extrai os valores enviados pelo formulário

// Criar um novo usuário (CREATE)
if (isset($BT1)) {
    $incluir = "INSERT INTO `usuarios`(`nome`, `email`, `senha`) VALUES ('$nome', '$email', '$senha')";
    banco("localhost", "root", NULL, "confeitaria", $incluir);
    echo "Usuário criado com sucesso!";
}

// Atualizar os dados do usuário (UPDATE)
if (isset($BT2)) {
    $update = "UPDATE `cliente` SET `nome` = '$nome', `email` = '$email', `senha` = '$senha' WHERE `id_cliente` = $id_cliente";
    banco("localhost", "root", NULL, "confeitaria", $update);
    echo "Usuário atualizado com sucesso!";
}

// Mostrar dados do usuário (READ)
if (isset($BT3)) {
    $consulta = "SELECT * FROM `cliente` WHERE `id_cliente` = $id_cliente";
    $dados = banco("localhost", "root", NULL, "confeitaria", $consulta);
    while ($linha = $dados->fetch_assoc()) {
        echo $linha['id_cliente'].",".$linha['nome'].",".$linha['email'].",".$linha['senha']."<br/>";
    }
}

// Remover usuário (DELETE)
if (isset($BT4)) {
    $delete = "DELETE FROM `cliente` WHERE `id_cliente` = $id_cliente";
    banco("localhost", "root", NULL, "confeitaria", $delete);
    echo "Usuário removido com sucesso!";
}

?>

<html>
    <head>
        <title>CRUD de Usuários</title>
    </head>
    <body>
        <h1>Gerenciamento de Usuários</h1>
        <form action="" method="post" enctype="multipart/form-data">
            ID: <input type="text" name="id_cliente" required><br/>
            Nome: <input type="text" name="nome" required><br/>
            E-mail: <input type="email" name="email" required><br/>
            Senha: <input type="text" name="senha" required><br/>
            <input type="submit" value="Salvar" name="BT1"> <!-- CREATE -->
            <input type="submit" value="Atualizar" name="BT2"> <!-- UPDATE -->
            <input type="submit" value="Mostrar" name="BT3"> <!-- READ -->
            <input type="submit" value="Excluir" name="BT4"> <!-- DELETE -->
        </form>
    </body>
</html>
