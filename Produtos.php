<?php
include "function.php";
    $consulta = "SELECT * FROM `produtos` ";
    $dados = banco("localhost", "root", NULL, "choconuts", $consulta);

    extract($_POST);
    if(isset($BT1)) {
        $incluir = "INSERT INTO `produtos`(`nome`, `preco`) VALUES ('$nome', '$preco')";
        banco("localhost", "root", NULL, "choconuts", $incluir);
    }
    if(isset($BT2)) {
        $update = "UPDATE `produtos` SET `preco` = '$preco' WHERE `nome` = '$nome'";
        banco("localhost", "root", NULL, "choconuts", $update);  
    }
    if (isset($BT3)) {
        $delete = "DELETE FROM `produtos` WHERE `nome` = '$nome'";
        banco("localhost", "root", NULL, "choconuts", $delete);
    }
    if (isset($BT4)) {
        header('Location: admin.php');
        exit();
    }
    
    if(isset($_FILES['imagem'])){
        $assets = "img/".$nome.".png" ;
        if(move_uploaded_file($_FILES['imagem']['tmp_name'],$assets));
    }
   
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Estilo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        img {
            display: block;
            width: 200px;
            height: 100px;
            margin: auto;
        }
        table {
            margin: 20px auto;
            margin-top: 20px;
            margin-bottom: 20px;
            border-collapse: collapse;
            justify-content: center;
            width: 100%;
            max-width: 600px;
            background-color: #ffffff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table th, table td {
            padding: 10px 15px;
            text-align: left;
            border: 1px solid #dddddd;
        }

        table th {
            background-color: #007bff;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f3f4f6;
        }

        table tr:hover {
            background-color: #e9ecef;
        }
        form {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 700px;
        }

        form h2 {
            text-align: center;
            color: #333333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333333;
        }

        input[type="file"],
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="submit"]:nth-child(4n+1) {
            background-color: #28a745;
        }

        input[type="submit"]:nth-child(4n+1):hover {
            background-color: #218838;
        }

        input[type="submit"]:nth-child(4n+2) {
            background-color: #ffc107;
        }

        input[type="submit"]:nth-child(4n+2):hover {
            background-color: #e0a800;
        }

        input[type="submit"]:nth-child(4n+3) {
            background-color: #17a2b8;
        }

        input[type="submit"]:nth-child(4n+3):hover {
            background-color: #117a8b;
        }

        input[type="submit"]:nth-child(4n+4) {
            background-color: #dc3545;
        }

        input[type="submit"]:nth-child(4n+4):hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
        <a href="index.php" class="logo">
            <img src="./assets/images/logo.svg" width="240" height="120"  alt="Choconuts logo">
        </a>
        <?php
echo "<table>
        <tr>
            <th>Produto</th>
            <th>Preço</th>
        </tr>";

if ($dados->num_rows > 0) {
    while ($linha = $dados->fetch_assoc()) {
        echo "<tr>
                <td>{$linha['nome']}</td>
                <td>{$linha['preco']}</td>
              </tr>";
    }
}

echo "</table>";
?>
        <h2>Novo Produto:</h2>
        <label for="imagem">Foto:</label>
        <input type="file" name="imagem" id="imagem">
        <label for="nome">Nome do produto:</label>
        <input type="text" name="nome" id="nome">
        <label for="preco">Preço do produto:</label>
        <input type="text" name="preco" id="preco">
        <input type="submit" value="Salvar" name="BT1">
        <input type="submit" value="Atualizar" name="BT2">
        <input type="submit" value="Deletar" name="BT3">
        <input type="submit" value="Voltar" name="BT4">
    </form>
</body>
</html>




