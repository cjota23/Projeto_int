<?php
session_start();
include "function.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Você precisa estar logado para acessar!'); window.location.href='login.php';</script>";
    exit();
}

$id_cliente = $_SESSION['id_cliente'];

$consulta = "SELECT * FROM `pedidos`";
$dados = banco("localhost", "root", NULL, "choconuts", $consulta);

extract($_POST);
if (isset($_POST['confirmar'])) {
    $updatePedido = "UPDATE pedidos SET status = 'Pedido Confirmado' WHERE id_pedido = $id_pedido";
    banco("localhost", "root", NULL, "choconuts", $updatePedido);
}

if (isset($_POST['cancelar'])) {
    $updatePedido = "UPDATE pedidos SET status = 'Pedido Cancelado' WHERE id_pedido = $id_pedido";
    banco("localhost", "root", NULL, "choconuts", $updatePedido);
}

if (isset($_POST['entrega'])) {
    $updatePedido = "UPDATE pedidos SET status = 'Pedido saiu para entrega' WHERE id_pedido = $id_pedido";
    banco("localhost", "root", NULL, "choconuts", $updatePedido);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f8f8f8;
            color: #333;
        }

        header {
            background-color: #6b3e26;
            color: white;
            padding: 20px;
            text-align: center;
            font-size: 22px;
            font-weight: 600;
        }

        .logo img {
            max-width: 180px;
        }

        .container {
            max-width: 800px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #6b3e26;
            font-size: 24px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        strong {
            color: #444;
        }

        form {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .btn {
            flex: 1;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .confirmar {
            background-color: #28a745;
        }

        .confirmar:hover {
            background-color: #218838;
        }

        .entrega {
            background-color: #007bff;
        }

        .entrega:hover {
            background-color: #0056b3;
        }

        .cancelar {
            background-color: #dc3545;
        }

        .cancelar:hover {
            background-color: #c82333;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .button-container button {
            padding: 12px 20px;
            background: #6b3e26;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .button-container button:hover {
            background: #8b5a2b;
        }

    </style>
</head>
<body>
    <?php 
        while ($linha = $dados->fetch_assoc()) {
            $dataFormatada = date('d/m/Y \à\s H:i', strtotime($linha['data']));
            echo "
            <div class='container'>
                <h2>Detalhes do Pedido #{$linha['id_pedido']}</h2>
                <p><strong>Data do Pedido:</strong> {$dataFormatada}</p>
                <p><strong>Endereço:</strong> {$linha['endereco']}, {$linha['bairro']}, {$linha['num']} - {$linha['cep']}</p>
                <p><strong>Método de Pagamento:</strong> {$linha['pagamento']}</p>
                <p><strong>Status:</strong> <span id='status-{$linha['id_pedido']}'>{$linha['status']}</span></p>
                <p><strong>Produto:</strong> {$linha['nome']}</p>
                <p><strong>Quantidade:</strong> {$linha['qtde']}</p>
                <p><strong>Total:</strong> R$ " . number_format($linha['preco'] * $linha['qtde'], 2, ',', '.') . "</p>

                <form method='post'>
                    <input type='hidden' name='id_pedido' value='{$linha['id_pedido']}'>
                    <button type='submit' name='confirmar' class='btn confirmar'>✅ Confirmar Pedido</button>
                    <button type='submit' name='entrega' class='btn entrega'>🚚 Saiu para Entrega</button>
                    <button type='submit' name='cancelar' class='btn cancelar'>❌ Cancelar Pedido</button>
                </form>
            </div>";
        }
    ?>

    <div class="button-container">
        <button onclick="window.location.href='admin.php'">Voltar</button>
    </div>

</body>
</html>

