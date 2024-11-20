<?php
require_once '../vendor/autoload.php';
use App\model\Carrinho;

// Cria instância da classe Carrinho
$carrinho = new Carrinho();

// Adicionar um produto ao carrinho (exemplo com ID 1 e quantidade 2)
$carrinho->adicionarProduto(1, 2);

// Remover um produto do carrinho (exemplo com ID 1)
$carrinho->removerProduto(1);

// Listar todos os produtos no carrinho
$produtos = $carrinho->listarCarrinho();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <script async src="JavaScript/carrinho.js"></script>
  <link rel="stylesheet" href="Style/carrinho.css">
  <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <title>Meu Carrinho</title>
  <style>

  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <!-- Adicionando fixed-top -->
    <button type="button" class="btn btn-link text-light mr-2">
      <img src="imagens/MarketRecycla.png" alt="menu" class="img-fluid">
    </button>
    <a class="navbar-brand" href="principal.php">MarketRecycla</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item">
          <a class="nav-link" href="sobre.php">Sobre</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contato.php">Contato</a>
        </li>
      </ul>

      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
      </form>

      <div class="btn-group mx-3" role="group" aria-label="Basic example">
        <a href="produto.php">
          <button type="button" class="btn btn-link text-light">Cadastrar Produto</button>
        </a>

        <a href="carrinho.php">


          <button type="button" class="btn btn-link text-light">

            <img src="imagens/Shopping cart.png" alt="Cadastrar Produto" class="car">
          </button>
        </a>

      </div>

      <a href="cadastro.php">
        <div class="perfil">
          <button type="button" class="btn btn-link text-light ml-3">
            <img src="imagens/Generic avatar.png" alt="Perfil" class="ft-pefil">
          </button>
        </div>
      </a>
    </div>
  </nav>

  <div class="cart-container">
    <div class="header">Meu Carrinho 🛒</div>

    <div class="cart-item">
      <div class="item-image">
        <img src="imagens/lixeirametal.jpg" alt="Lixeira">
      </div>
      <div class="detalhes">
        <p class="name">Lixeira 50 litros lata de lixo americana aço galvanizado</p>
        <p class="price"> <span class="preco" data-price="270">R$ 270,00</span></p>

        <div class="container">
          <div class="botões">
            <button class="menos">-</button>
            <span class="quantidade">1</span>
            <button class="mais">+</button>
          </div>

          <div class="quantity-bar">
            <div class="quantity-fill" id="quantity-fill" style="width: 1%;"></div>
          </div>

         

          <button type="button" class="remover">Remover</button>
        </div>
        <p class="localização">São Paulo, Av. Juscelino Kubitschek | 21/10/2024 21:29</p>
      </div>
    </div>

    <div class="divider"></div>
    <div class="cart-item">
      <div class="item-image">
        <img src="imagens/garrafapet.jfif" alt="Lixeira">
      </div>
      <div class="detalhes">
        <p class="name">Garrafa Pet 2,5L</p>
        <p class="price"><span class="preco" data-price="16">R$ 16,00</span></p>

        <div class="container">
          <div class="botões">
            <button class="menos">-</button>
            <span class="quantidade">1</span>
            <button class="mais">+</button>
          </div>

          <div class="quantity-bar">
            <div class="quantity-fill" id="quantity-fill" style="width: 1%;"></div>
          </div>

          

          <button type="button" class="remover">Remover</button>
        </div>
        <p class="localização">São Paulo, Av. Juscelino Kubitschek | 21/10/2024 21:29</p>
      </div>
    </div>
    <div class="divider"></div>
    <p class="total">Total R$ <span id="valorTotal">0,00</span></p>
  
    <button type="button" class="comprar">Finalizar Compra</button>
  </div>

  




</body>

</html>