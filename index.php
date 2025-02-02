<?php
session_start();
include "function.php";
extract($_POST);

if (isset($_POST['add_to_cart'])) {
    $id_produtos = $_POST['id_produtos'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $qtde = 1;

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        echo "<script>alert('Você precisa estar logado para adicionar itens ao carrinho!'); window.location.href='login.php';</script>";
        exit();
    }

    $id_cliente = $_SESSION['id_cliente'];

    $consulta = "SELECT id_carrinho FROM carrinho WHERE id_produtos = $id_produtos AND id_cliente = $id_cliente";
    $result = banco("localhost", "root", NULL, "choconuts", $consulta);

    if ($result && $result->num_rows > 0) {
        $update = "UPDATE carrinho SET qtde = qtde + $qtde WHERE id_produtos = $id_produtos AND id_cliente = $id_cliente";
        banco("localhost", "root", NULL, "choconuts", $update);
        echo "<script>alert('Quantidade atualizada no carrinho!');</script>";
    } else {
        $consulta = "INSERT INTO carrinho (id_carrinho, id_cliente, id_produtos, qtde, nome, preco) VALUES (NULL, $id_cliente, $id_produtos, $qtde, '$nome', $preco)";
        banco("localhost", "root", NULL, "choconuts", $consulta);
        echo "<script>alert('Produto adicionado ao carrinho!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Choconuts - Materializando seus sonhos</title>
  <link rel="stylesheet" href="./assets/css/style.css">
  <link rel="preload" href="./assets/images/hero.jpeg" as="image">
  <meta name="description" content="Choconuts - Confeitaria artesanal com receitas caseiras feitas com muito amor e carinho.">
  <meta name="keywords" content="chocolate, confeitaria, doces, bolos, sobremesas">
</head>

<body id="top">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/css/ionicons.min.css">
    <link rel="stylesheet" href="./assets/css/style.css"> 
  </head>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- #HEADER -->
  <header class="header" data-header>
    <div class="container">
      <div class="overlay" data-overlay></div>
  
      <!-- Logo principal -->
      <a href="#" class="logo">
        <img src="./assets/images/logo.svg" width="240" height="100" alt="Choconuts logo">
      </a>
  
      <!-- Menu de navegação -->
      <nav class="navbar" data-navbar>
        <button class="nav-close-btn" data-nav-close-btn aria-label="Fechar Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>
  
        <a href="#" class="logo">
          <img src="./assets/images/logo.svg" width="200" height="50" alt="Choconuts logo">
        </a>
  
        <!-- Links de navegação -->
        <ul class="navbar-list">
          <li class="navbar-item"><a href="#inicio" class="navbar-link">Início</a></li>
          <li class="navbar-item"><a href="#encomendas" class="navbar-link">Encomendas</a></li>
          <li class="navbar-item"><a href="#loja" class="navbar-link">Loja</a></li>
          <li class="navbar-item"><a href="#contato" class="navbar-link">Contato</a></li>
        </ul>
  
        <!-- Ações do usuário -->
        <ul class="nav-action-list">
  
          <li>
            <a href="profile.php" class="nav-action-btn login-btn" title="Acesse sua conta">
              <ion-icon name="person-outline" aria-hidden="true"></ion-icon>
              <span>Perfil</span>
            </a>
          </li>
  
          <li>
            <button class="nav-action-btn cart-btn" title="Ver Carrinho" onclick="window.location.href='carrinho.php';">
              <ion-icon name="cart-outline" aria-hidden="true"></ion-icon>
              <span>Carrinho</span>
            </button>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <main>
    <article>

      <!-- #HERO -->
      <section id="inicio" class="section hero" style="background-image: url('./assets/images/hero.png')">
        <div class="container">
          <h2 class="h1 hero-title">Transformando açúcar <strong>em sorrisos!</strong> </h2>
          <p class="hero-text">
            Receitas caseiras feitas com muito amor e carinho especialmente para você!
          </p>
          <button class="btn btn-primary" onclick="location.href='sobre.html'">
          Sobre nós
          <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
        </button>

        </div>
      </section>

      <!-- #COLEÇÃO -->
      <section id="encomendas" class="section collection">
        <div class="container">
          <ul class="collection-list has-scrollbar">
            <li>
              <div class="collection-card" style="background-image: url('./assets/images/6.png')">
                <h3 class="h4 card-title">Casamento</h3>
                <a href="#contato" class="btn btn-secondary">
                  Encomende já
                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>
            <li>
              <div class="collection-card" style="background-image: url('./assets/images/7.png')">
                <h3 class="h4 card-title">Aniversário</h3>
                <a href="#contato" class="btn btn-secondary">
                  Encomende já
                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>
            <li>
              <div class="collection-card" style="background-image: url('./assets/images/8.png')">
                <h3 class="h4 card-title">Caseiro</h3>
                <a href="#contato" class="btn btn-secondary">
                  Encomende já
                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </section>

      <!-- #PRODUCT -->
      <section id="loja" class="section product">
        <div class="container">
          <h2 class="h2 section-title">Produtos a venda</h2>
          
          
          <?php
            // Consulta para obter os produtos
            $consulta = "SELECT * FROM produtos";
            $result = banco("localhost", "root", NULL, "choconuts", $consulta);

            echo "<ul class='product-list'>";

            // Exibe os produtos da consulta
            while ($linha = $result->fetch_assoc()) {
                echo "
                <li class='product-item'>
                    <div class='product-card' tabindex='0'>
                        <figure class='card-banner'>
                            <img src='./assets/images/{$linha['nome']}.png' width='312' height='350' loading='lazy' alt='{$linha['nome']}' class='image-contain'>
                            <ul class='card-action-list'>
                                <li class='card-action-item'>
                                    <form method='post'>
                                        <input type='hidden' name='id_produtos' value='{$linha['id_produtos']}'>
                                        <input type='hidden' name='nome' value='{$linha['nome']}'>
                                        <input type='hidden' name='preco' value='{$linha['preco']}'>
                                        <button class='card-action-btn' aria-labelledby='card-label-{$linha['id_produtos']}' name='add_to_cart'>
                                            <ion-icon name='cart-outline'></ion-icon>
                                        </button>
                                        <div class='card-action-tooltip' id='card-label-{$linha['id_produtos']}'>Adicione ao carrinho</div>
                                    </form>
                                </li>
                            </ul>
                        </figure>
                        <div class='card-content'>
                            <div class='card-cat'>
                                <a href='#'> </a>
                            </div>
                            <h3 class='h3 card-title'>
                                <a href='#'>{$linha['nome']}</a>
                            </h3>
                            <data class='card-price' value='{$linha['preco']}'>R$ " . number_format($linha['preco'], 2, ',', '.') . "</data>
                        </div>
                    </div>
                </li>";
            }

            echo "</ul>";

            
          ?>
          
        </div>
      </section>
      
      <!-- #FOOTER -->
      <footer id="contato" class="footer">
        <div class="footer-top section">
          <div class="container">
            <div class="footer-link-box">
              <ul class="footer-list">
                <li><p class="footer-list-title">Contatos</p></li>
                <li><a href="tel:+5573981234567" class="footer-link"><ion-icon name="call"></ion-icon><span class="footer-link-text">+5573981234567</span></a></li>
                <li><a href="mailto:choconuts@gmail.com" class="footer-link"><ion-icon name="mail"></ion-icon><span class="footer-link-text">choconuts@gmail.com</span></a></li>
              </ul>
              <ul class="footer-list">
                <li><p class="footer-list-title">Menu</p></li>
                <li><a href="#inicio" class="footer-link"><ion-icon name="chevron-forward-outline"></ion-icon><span class="footer-link-text">Ínicio</span></a></li>
                <li><a href="#encomendas" class="footer-link"><ion-icon name="chevron-forward-outline"></ion-icon><span class="footer-link-text">Encomendas</span></a></li>
                <li><a href="#loja" class="footer-link"><ion-icon name="chevron-forward-outline"></ion-icon><span class="footer-link-text">Loja</span></a></li>
                <li><a href="#contato" class="footer-link"><ion-icon name="chevron-forward-outline"></ion-icon><span class="footer-link-text">Contato</span></a></li>
              </ul>
              <div class="footer-list">
            <p class="footer-list-title">Horários de funcionamento</p>
            <table class="footer-table">
              <tbody>
                <tr class="table-row">
                  <th class="table-head" scope="row">Seg - Sex:</th>
                  <td class="table-data">8hrs à 18hrs</td>
                </tr>
                <tr class="table-row">
                  <th class="table-head" scope="row">Sábado:</th>
                  <td class="table-data">8hrs às 12hrs</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="footer-list">
            <p class="newsletter-text">
              FAÇA JÁ SUA ENCOMENDA!
            </p>
            <div class="footer-brand">
              <ul class="social-list">
                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-facebook"></ion-icon>
                  </a>
                </li>
                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-twitter"></ion-icon>
                  </a>
                </li>
                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-pinterest"></ion-icon>
                  </a>
                </li>
                <li>
                  <a href="#" class="social-link">
                    <ion-icon name="logo-linkedin"></ion-icon>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          
        </div>
      </div>
    </div>
        <div class="footer-bottom">
          <div class="container">
            <p class="copyright">&copy; 2024 Choconuts. Todos os direitos reservados.</p>
          </div>
        </div>
      </footer>

      <!-- #Voltar pro topo -->
      <a href="#top" class="go-top-btn" data-go-top>
        <ion-icon name="arrow-up-outline"></ion-icon>
      </a>

    </article>
  </main>

</body>
</html>
