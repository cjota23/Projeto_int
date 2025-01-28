<?php
session_start();
include "function.php";

$id_cliente = $_SESSION['id_cliente'];

// Consulta para pegar itens do carrinho do usuário logado
$consulta = "SELECT c.id_carrinho AS cart_id, p.nome, p.preco, c.qtde 
            FROM carrinho c
            JOIN produtos p ON c.id_produtos = p.id_produtos
            WHERE c.id_cliente = $id_cliente";
$result = banco("localhost", "root", NULL, "choconuts", $consulta);


extract($_POST);

if(isset($BT1)) {
    $incluir = "INSERT INTO `pedidos`(`id_pedido`,`id_cliente`,`endereco`, `bairro`, `num`, `cep`, `pagamento`, `nome`, `preco`,`qtde`) 
    SELECT 
            NULL, 
            c.id_cliente, 
            '$endereco', 
            '$bairro', 
            $num, 
            '$cep', 
            '$pagamento', 
            p.nome, 
            p.preco, 
            c.qtde
        FROM 
            carrinho c
        JOIN 
            produtos p ON c.id_produtos = p.id_produtos
        WHERE 
            c.id_cliente = $id_cliente";    
    banco("localhost", "root", NULL, "choconuts", $incluir);

    $limparCarrinho = "DELETE FROM carrinho WHERE id_cliente = $id_cliente";
    banco("localhost", "root", NULL, "choconuts", $limparCarrinho);

    header('Location: read.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido</title>
    <style>
        /* Estilo para o container principal */
.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

/* Estilo do título */
h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
}

/* Estilo dos grupos de formulário */
.form-group {
    margin-bottom: 15px;
}

/* Estilo dos labels */
label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    color: #555;
}

/* Estilo dos inputs e select */
input[type="text"], input[type="number"], select {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Estilo do botão de submit */
button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #28a745;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

/* Estilo do botão no hover */
button[type="submit"]:hover {
    background-color: #218838;
}

/* Estilo do resumo do pedido */
#detalhes {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    padding: 10px;
    border-radius: 5px;
    background-color: #f9f9f9;
    margin-top: 10px;
}

/* Estilo da imagem dos itens no carrinho */
.cart-item-img {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 15px;
}

/* Estilo do texto dos detalhes do pedido */
#detalhes p {
    margin: 0;
    font-size: 16px;
    color: #555;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Finalizar Pedido</h2>
        <form action="#" method="POST">
            <!-- Endereço de Entrega -->
            <div class="form-group">
                <label for="nome">Endereço:</label>
                <input type="text" name="endereco" required>
            </div>
            <div class="form-group">
                <label for="bairro">Bairro:</label>
                <input type="text" name="bairro" required>
            </div>
            <div class="form-group">
                <label for="num">N°:</label>
                <input type="number" name="num" required>
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" name="cep" required>
            </div>

            <!-- Opções de Pagamento -->
            <div class="form-group">
                <label for="pagamento">Método de Pagamento</label>
                <select id="pagamento" name="pagamento" required>
                    <option value="Cartão de Crédito">Cartão de Crédito</option>
                    <option value="Cartão de Débito">Cartão de Débito</option>
                    <option value="Dinheiro">Dinheiro</option>
                    <option value="Pix">Pix</option>
                </select>
            </div>

            <!-- Resumo do Pedido e Confirmação -->
            <?php 
                echo "<label for='resumo'>Resumo do Pedido</label>";
                while ($linha = $result->fetch_assoc()) {
                    echo "
                    <div class='form-group'>
                        <div id='detalhes'>
                            <img src='./assets/images/{$linha['nome']}.png' alt='{$linha['nome']}' class='cart-item-img'>
                            <p>{$linha['qtde']} {$linha['nome']} - R$" . number_format($linha['preco'] * $linha['qtde'], 2) ."</p>
                        </div>
                    </div>";
                }    
        
            ?>
            <button type='submit' name='BT1'>Finalizar Pedido</button>";
        </form>
    </div>
</body>
</html>
