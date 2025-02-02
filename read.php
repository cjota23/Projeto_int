<?php
session_start();
include "function.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Você precisa estar logado para acessar!'); window.location.href='login.php';</script>";
    exit();
}
$id_cliente = $_SESSION['id_cliente'];

$consulta = "SELECT * FROM `pedidos` WHERE `id_cliente` = $id_cliente";
$dados = banco("localhost", "root", NULL, "choconuts", $consulta);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }

        .container h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }

        .container p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
        }

        table th, table td {
            text-align: left;
            padding: 12px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .button-container {
            text-align: center;
            margin: 20px auto;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <?php 
        while ($linha = $dados->fetch_assoc()) {
            echo "
            <div class='container'>
                <h2>Detalhes do Pedido #{$linha['id_pedido']}</h2>
                <p><strong>Endereço:</strong> {$linha['endereco']}, {$linha['bairro']}, {$linha['num']} - {$linha['cep']}</p>
                <p><strong>Método de Pagamento:</strong> {$linha['pagamento']}</p>
                <p><strong>Status:</strong> {$linha['status']}</p>
                <p><strong>Produto:</strong> {$linha['nome']}</p>
                <p><strong>Total:</strong> R$ " . number_format($linha['preco'] * $linha['qtde'], 2, ',', '.') . "</p>
            </div>";
        }
    ?>
    </table>
    <div class="button-container">
        <button onclick="window.location.href='index.php'">Confimar</button>
    </div>
</body>
</html>
