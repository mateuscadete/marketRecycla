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
    <link rel="stylesheet" href="view/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name=" Usuario" placeholder=" Usuario" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <button type="submit">cadastrar</button>
            <br><br>
        </form>
        <?php if ($mensagem): ?>
            <div class="message <?php echo strpos($mensagem, 'sucesso') !== false ? 'success' : 'error'; ?>">
                <?php echo htmlspecialchars($mensagem); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>