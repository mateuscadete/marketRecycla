<?php
require_once '../vendor/autoload.php';
include "./model/Login.php";
use App\model\Login;

$mensagem = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $user = new Login($nome, $senha);
    $mensagem = $user->entrar();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style/index.css">
    <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
    <link rel="manifest" href="pwa/manifest.json">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Login</title>
    
</head>
<body>
<?php 
include "Include/navbar.php";
?>
    
       <div class="login">
        <form method="POST" action="">
        <h2>Login</h2>    
        
        
        <input type="text" name="nome" placeholder="Insira seu nome" required>
        
   <br><br>
        
        <input type="password" name="senha" placeholder="Insira sua senha" required>


        <button class="cadastrar" type="submit">Entrar</button>
            <br><br>
        
            <a href="cadastro.php">Fazer Cadastro </a>  
            
            <?php if ($mensagem): ?>
            <center class="message <?php echo strpos($mensagem, 'sucesso') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($mensagem); ?>
        
        <?php endif; ?>
             </form>
    </div>
</body>
</html>