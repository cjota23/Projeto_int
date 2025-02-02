<?php
session_start();
include "function.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Você precisa estar logado para acessar!'); window.location.href='login.php';</script>";
    exit();
}
$id_cliente = $_SESSION['id_cliente'];

// pegar itens do carrinho do usuário logado
$consulta = "SELECT c.id_carrinho AS cart_id, p.nome, p.preco, c.qtde 
            FROM carrinho c
            JOIN produtos p ON c.id_produtos = p.id_produtos
            WHERE c.id_cliente = $id_cliente";
$result = banco("localhost", "root", NULL, "choconuts", $consulta);


extract($_POST);

if(isset($BT1)) {
    $incluir = "INSERT INTO `pedidos`(`id_pedido`,`id_cliente`,`endereco`, `bairro`, `num`, `cep`, `pagamento`, `nome`, `preco`,`qtde`) 
    SELECT NULL, c.id_cliente, '$endereco', '$bairro', $num, '$cep', '$pagamento', p.nome, p.preco, c.qtde
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

if(isset($BT2)) {
    $limparCarrinho = "DELETE FROM carrinho WHERE id_cliente = $id_cliente";
    banco("localhost", "root", NULL, "choconuts", $limparCarrinho);

    header('Location: index.php#loja');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/pag.css">
    <title>Finalizar Pedido</title>
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
            <button type='submit' name='BT1'>Finalizar Pedido</button>
            <button type='submit' name='BT2'>Cancelar Pedido</button>
        </form>
    </div>
</body>
</html>
