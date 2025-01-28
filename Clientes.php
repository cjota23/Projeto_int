<?php
include "function.php";
extract($_POST);
    $consulta = "SELECT * FROM `cliente` ";
    $dados = banco("localhost", "root", NULL, "choconuts", $consulta);

    // Remover cliente
    if (isset($delete)) {
        $delete = "DELETE FROM `cliente` WHERE `nome` = $nome";
        banco("localhost", "root", NULL, "choconuts", $delete);
    }
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes do Choconuts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 50px;
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
            background-color:hsl(5, 76.10%, 39.40%);
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

        button{ 
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #cccccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color:hsl(5, 76.10%, 39.40%);
            color: #ffffff;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: hsl(5, 74.70%, 32.50%);
        }

    </style>
</head>
<body>
    <form action="#" method="post" enctype="multipart/form-data">
    <img src="./assets/images/logo.svg" alt="Choconuts logo">    
    
        <?php
            echo "<table>
                <tr>
                    <th>Cliente</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th></th>
                </tr>";

            if ($dados->num_rows > 0) {
                while ($linha = $dados->fetch_assoc()) {
                    echo "<tr>
                            <td>{$linha['nome']}</td>
                            <td>{$linha['email']}</td>
                            <td>{$linha['telefone']}</td>
                            <td><button type='submit' name='delete'>X</button></td>
                        </tr>";

                }
            }

            echo "</table>";
        ?>
    </form>
</body>
</html>




