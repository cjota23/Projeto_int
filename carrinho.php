<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }

        header {
            background-color: #333;
            color: white;
            padding: 15px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 15px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            margin-right: 15px;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .cart-item-price {
            color: #666;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
        }

        .cart-item-quantity input {
            width: 40px;
            text-align: center;
            margin: 0 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
        }

        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 20px;
        }

        .checkout-button {
            display: block;
            width: 100%;
            text-align: center;
            padding: 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            font-size: 16px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .checkout-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h1>Seu Carrinho</h1>
    </header>
    <div class="container">
        <div class="cart-item">
            <img src="https://via.placeholder.com/80" alt="Produto 1">
            <div class="cart-item-details">
                <div class="cart-item-name">Produto 1</div>
                <div class="cart-item-price">R$ 50,00</div>
            </div>
            <div class="cart-item-quantity">
                <button>-</button>
                <input type="number" value="1">
                <button>+</button>
            </div>
        </div>

        <div class="cart-item">
            <img src="https://via.placeholder.com/80" alt="Produto 2">
            <div class="cart-item-details">
                <div class="cart-item-name">Produto 2</div>
                <div class="cart-item-price">R$ 30,00</div>
            </div>
            <div class="cart-item-quantity">
                <button>-</button>
                <input type="number" value="1">
                <button>+</button>
            </div>
        </div>

        <div class="total">Total: R$ 80,00</div>
        <a href="#" class="checkout-button">Finalizar Compra</a>
    </div>
</body>
</html>
