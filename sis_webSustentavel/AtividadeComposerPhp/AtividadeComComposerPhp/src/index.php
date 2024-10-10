<?php
require_once '../vendor/autoload.php';

use App\model\Login;

use App\model\Usuario;
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $user = new Login($usuario, $senha);
    $mensagem = $user->entrar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    
</head>
<body>


    
       
        <form method="POST" action="">
        <h2>Login</h2>    
        
        <div class="input">
        <input type="text" name=" Usuario" placeholder="Insira seu nome" required>
        </div>

        <div class="input">
        <input type="password" name="senha" placeholder="Insira sua senha" required>
</div>

        <button class="cadastrar" type="submit">Entrar</button>
            <br><br>
        
            <a href="cadastro.php">Fazer Cadastro </a>   
             </form>
        <?php if ($mensagem): ?>
            <div class="message <?php echo strpos($mensagem, 'sucesso') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($mensagem); ?>
                </div>
        <?php endif; ?>
    </div>
</body>
</html>