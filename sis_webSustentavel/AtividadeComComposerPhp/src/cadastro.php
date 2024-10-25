<?php
require_once '../vendor/autoload.php';

use App\model\Cadastro;

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['nome'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $email = $_POST['email'] ?? '';
    $cpf = $_POST['cpf'] ?? '';

   
    $user = new Cadastro($usuario, $senha, $email, $cpf);

  
    $mensagem = $user->cadastrar();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style/cadastro.css">
    <!-- Adicionando o Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
    <!-- Barra de Navegação -->
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
                <li class="nav-item active">
                    <a class="nav-link" href="sobre.html">Sobre</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="contatos.html">Contato</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

            <div class="btn-group mx-3" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-link text-light">Compras Recorrentes</button>
                <a href="produto.php">
                    <button type="button" class="btn btn-link text-light">

                        <img src="imagens/Shopping cart.png" alt="Cadastrar Produto" class="img-fluid">
                    </button></a>

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

    <!-- Formulário de Cadastro -->
    <div class="login-container" style="margin-top: 80px;"> <!-- Ajustando a margem superior para dar espaço ao nav -->
        <h2>Criar sua conta</h2>
        <form method="POST" action="">
            <input type="text" name="nome" placeholder="Insira seu nome" required>
            <input type="text" name="email" placeholder="Insira seu email" required>
            <input type="text" name="cpf" placeholder="Insira seu CPF" required>
            <input type="password" name="senha" placeholder="Crie uma senha" required>
            <button type="submit">Cadastrar</button>
        </form>
        <div class="options">
            <a href="index.php">Fazer login</a>
        </div>
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