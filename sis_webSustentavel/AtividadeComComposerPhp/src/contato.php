<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style/contato.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <title>Contato - MarketRecycla</title>
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

    <form class="contato">

        <h1>Entre em contato</h1>

        <input type="text" id="nomeid" placeholder="Insira o seu nome" required="required" name="nome" />
        <label for="nome">Nome</label>
        <br><br>
        <input type="tel" id="foneid" placeholder="Insira seu numero" name="fone" />
        <label for="fone">Telefone</label>
        <br><br>
        <input type="email" id="emailid" placeholder="Insira seu email" name="email" />
        <label for="email">Email</label>
        <br><br>
        <textarea placeholder="Deixe sua mensagem"></textarea>
<br><br>
        <input type="submit" class="enviar" onclick="Enviar();" value="Enviar" />
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>