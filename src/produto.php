<?php
require_once '../vendor/autoload.php';

use App\model\Produto;

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $qtde = $_POST['qtde'] ?? '';
    $descricao= $_POST['descricao'] ?? '';
    $preco= $POST['preco'] ?? '';

   
    $user = new Produto($nome, $qtde, $descricao, $preco);

  
    $mensagem = $user->cadastrar_produto();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style/cadastro.css">
    <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Produto</title>
</head>

<body>
    <!-- Barra de Navegação -->
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

    <!-- Formulário de Cadastro -->
    <div class="login-container" style="margin-top: 80px;"> <!-- Ajustando a margem superior para dar espaço ao nav -->
        <h2>Cadastre o Produto</h2>
        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Insira o nome do Produto" required>
            <input type="number" name="qtd" placeholder="Insira a quantidade do produto" required>
            <input type="text" name="descricao"  placeholder="Insira sua descrição" required >
            <input type="number" name="preco"  placeholder="Insira seu preço" required >
            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>

    <!-- Adicionando o Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <?php if ($mensagem): ?>
            <div class="message <?php echo strpos($mensagem, 'sucesso') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>