

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/principal.css"> <!-- Link para seu CSS -->
    <title>MarketRecycla</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <!-- Adicionando fixed-top -->
        <button type="button" class="btn btn-link text-light mr-2">
            <img src="imagens/menu.png" alt="menu" class="img-fluid">
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
                
                    <button type="button" class="btn btn-link text-light">

                        <img src="imagens/Shopping cart.png" alt="Cadastrar Produto" class="img-fluid">
                    </button>

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
    <main>
        <div class="container-fluid">
            <div class="d-flex no-gutters">


                <div class="image-container">
                    <a href="./Produtos/plastico.php">
                        <img src="imagens/Plastico.png" alt="Plástico" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Plástico</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="./Produtos/vidro.php">
                        <img src="imagens/Vidro.png" alt="Vidro" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Vidro</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="./Produtos/aluminio.php">
                        <img src="imagens/Metal.png" alt="Metal" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Metal</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="./Produtos/papel.php">
                        <img src="imagens/Papel.png" alt="Papel" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Papel</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="./Produtos/eletronicos.php">
                        <img src="imagens/Eletronicos.png" alt="Eletrônicos" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Eletrônicos</div>
                </div>
                </a>

            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>