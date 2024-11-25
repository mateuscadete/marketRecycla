<link rel="stylesheet" href="Style/nav.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <!-- Adicionando fixed-top -->
        <button type="button" class="btn btn-link text-light mr-2">
            <img src="../imagens/MarketRecycla.png" alt="menu" class="logo">
        </button>
        <a class="navbar-brand" href="../principal.php">MarketRecycla</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="../sobre.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contato.php">Contato</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

            <div class="btn-group mx-3" role="group" aria-label="Basic example">
            <a href="../produto.php">    
            <button type="button" class="btn btn-link text-light">Cadastrar Produto</button>
            </a>

            <a href="../carrinho.php">

                
                    <button type="button" class="btn btn-link text-light">

                        <img src="../imagens/Shopping cart.png" alt="Cadastrar Produto" class="car">
                    </button>
   </a>

            </div>

            <a href="../cadastro.php">
                <div class="perfil">
                    <button type="button" class="btn btn-link text-light ml-3">
                        <img src="../imagens/Generic avatar.png" alt="Perfil" class="ft-perfil">
                    </button>
                </div>
            </a>
        </div>
</nav>
