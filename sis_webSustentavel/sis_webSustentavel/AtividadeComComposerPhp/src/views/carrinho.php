<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <link rel="icon" href="imagens/MR.ico" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/carrinho.css"> <!-- Link para seu CSS -->
    <title>Meu Carrinho</title>
  
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <!-- Adicionando fixed-top -->
        <button type="button" class="btn btn-link text-light mr-2">
            <img src="imagens/MarketRecycla1.png" alt="menu" class="img-fluid">
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

                        <img src="imagens/Shopping cart.png" alt="Cadastrar Produto" class="img-fluid">
                    </button>
</a>

            </div>

            <a href="cadastro.php">
                <div class="perfil">
                    <button type="button" class="btn btn-link text-light ml-3">
                        <img src="imagens/Generic avatar.png" alt="Perfil" class="img-fluid">
                    </button>
                </div>
            </a>
        </div>
    </nav>


  <div class="cart-container">
    <div class="header">Meu Carrinho 🛒</div>
    
    <div class="cart-item">
      <div class="item-image">
        <img src="https://img.icons8.com/ios-filled/50/000000/trash.png" alt="Lixeira">
      </div>
      <div class="item-details">
        <p class="item-name">Lixeira 50 litros lata de lixo americana aço galvanizado</p>
        <p class="item-price" id="item-price">R$ 270,00</p>
        <div class="quantity-container">
          <div class="quantity-buttons">
            <button class="quantity-button" onclick="decreaseQuantity()">-</button>
            <span class="quantity-indicator" id="quantity">1</span>
            <button class="quantity-button" onclick="increaseQuantity()">+</button>
          </div>
          <div class="quantidade">
            <div class="quantity-fill" id="quantity-fill" style="width: 20%;"></div>
          </div>
          <button class="buy-button">Comprar</button>
        </div>
        <p class="location-info">São Paulo, Av. Juscelino Kubitschek | 21/10/2024 21:29</p>
      </div>
    </div>
    
    <div class="divider"></div>
  </div>

  <script href="Javascript/carrinho.js">
    
  </script>
</body>
</html>
