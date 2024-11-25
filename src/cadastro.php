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
    <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>

<body>
<?php
include "Include/navbar.php";
?>
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