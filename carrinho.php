<?php
session_start();
include "function.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Você precisa estar logado para acessar o carrinho!'); window.location.href='login.php';</script>";
    exit();
}

$id_cliente = $_SESSION['id_cliente'];

// Consulta para pegar itens do carrinho do usuário logado
$consulta = "SELECT c.id_carrinho AS cart_id, p.nome, p.preco, c.qtde 
            FROM carrinho c
            JOIN produtos p ON c.id_produtos = p.id_produtos
            WHERE c.id_cliente = $id_cliente";
$result = banco("localhost", "root", NULL, "choconuts", $consulta);

if (isset($_POST['cancelar'])) {
    $limparCarrinho = "DELETE FROM carrinho WHERE id_cliente = $id_cliente";
    banco("localhost", "root", NULL, "choconuts", $limparCarrinho);
    header('Location: index.php#loja');
    exit();
}
if (isset($_POST['add'])) {
    header('Location: index.php#loja');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/carrinho.css">
    <title>Carrinho de Compras</title>
</head>
<body>
    <header>
        <a href="index.php" class="logo">
            <img src="./assets/images/logo.svg" width="200" height="200"  alt="Choconuts logo">
        </a>
        <h2>Carrinho de Compras</h2>
        <div class="header-buttons">
            <form method="post">
                <button class="btn cancelar" name="cancelar"> Cancelar</button>
                <button class="btn adicionar" name="add"> Adicionar Mais Itens</button>
            </form>
        </div>
    </header>

    <div class="container">
    <h3></h3>
    <div class="cart-header">
        <div class="cart-header-item">Item</div>
        <div class="cart-header-preco">Preço</div>
        <div class="cart-header-qtde">Quantidade</div>
    </div>

    <?php 
        // Exibindo os itens do carrinho
        $total = 0;
        while ($linha = $result->fetch_assoc()) {
            // Calculando o subtotal para cada item
            $subtotal = $linha['preco'] * $linha['qtde'];
            $total += $subtotal; // Somando o subtotal ao total

            echo "
            <div class='cart-item'>
                <div class='cart-item-nome'>
                    <img src='./assets/images/{$linha['nome']}.png' alt='{$linha['nome']}' class='cart-item-img'>
                    <p>{$linha['nome']}</p>
                </div>
                <div class='cart-item-preco'>
                    <p>R$" . number_format($linha['preco'], 2) ."</p>
                    <p>  </p>
                </div>
                <div class='cart-item-qtde'>
                    <form method='post'>
                        <input type='hidden' name='id' value='{$linha['cart_id']}'>
                        
                        <button type='submit' name='menos' class='quantity-button'>-</button>
                        <span class='quantity-value'>{$linha['qtde']}</span>
                        <button type='submit' name='mais' class='quantity-button'>+</button>
                        
                        <button type='submit' name='remove_cart' class='remove-button'>X</button>
                    </form>
                </div>
            </div>";
        }
    ?>

    <!-- Exibindo o total do carrinho -->
    <div class="total">
        Total: R$ <?php echo number_format($total, 2); ?>
    </div>

    <a href="pagamento.php" class="checkout-button">Finalizar Compra</a>
</div>


    <?php
        //atualização e remoção do carrinho
        extract($_POST);

        if (isset($mais)) {
            $update = "UPDATE carrinho SET qtde = qtde + 1 WHERE id_carrinho = $id";
            banco("localhost", "root", NULL, "choconuts", $update);
        }

        if (isset($menos)) {
            $update = "UPDATE carrinho SET qtde = qtde - 1 WHERE id_carrinho = $id";
            banco("localhost", "root", NULL, "choconuts", $update);
        }

        if (isset($remove_cart)) {
            $delete = "DELETE FROM carrinho WHERE id_carrinho = $id";
            banco("localhost", "root", NULL, "choconuts", $delete);
        }
    ?>
</body>
</html>
