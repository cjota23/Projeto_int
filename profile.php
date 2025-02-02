<?php
session_start();
include "function.php";

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "<script>alert('Você precisa estar logado para acessar o seu perfil!'); window.location.href='login.php';</script>";
    exit();}

$id_cliente = $_SESSION['id_cliente'];

$consulta = "SELECT * FROM `cliente` WHERE id_cliente = $id_cliente";
$dados = banco("localhost", "root", NULL, "choconuts", $consulta);

if (isset($_POST['logout'])) {
    session_unset();

    session_destroy();

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/css/profile.css">
  <title>Seu Perfil</title>
</head>
<body>
  <header>
    <h1>Meu Perfil</h1>
    <nav>
        <form method="post">
            <button type="submit" name="logout" class="logout">Sair</button>
        </form>

    </nav>
  </header>

  <div class="container">
    <!-- Menu lateral -->
    <div class="sidebar">
      <ul>
        <li><a href="#" class="active">Meu Perfil</a></li>
        <li><a href="read.php">Meus Pedidos</a></li>
        <li><a href="carrinho.php">Meu Carrinho</a></li>
        <li><a href="index.php">Voltar</a></li>
      </ul>
    </div>

    <!-- Conteúdo principal -->
    <div class="content">
      <h2>Dados Pessoais</h2>
      <?php 
        while ($linha = $dados->fetch_assoc()) {
            echo "
            <div class='order-list'>
                <div class='order-item'>
                    <div class='order-details'>
                        <p><strong>Nome:</strong> </p>
                        <p >{$linha['nome']}</span></p>
                    </div>
                </div>       
                <div class='order-item'>
                    <div class='order-details'>
                        <p><strong>Email:</strong></p>
                        <p >{$linha['email']}</span></p>
                    </div>
                </div>       
                <div class='order-item'>
                    <div class='order-details'>
                        <p><strong>Telefone:</strong> </p>
                        <p >{$linha['telefone']}</span></p>
                    </div>
                </div>";
        }
    ?>
    <footer>
        <div>
          <div>
            <p class="copyright">&copy; 2024 Choconuts. Todos os direitos reservados.</p>
          </div>
        </div>
    </footer>
</body>
</html>
