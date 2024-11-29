<?php
session_start();

// Verifica se precisa limpar o carrinho
if (isset($_GET['clear']) && $_GET['clear'] == '1') {
    // Garante que o carrinho esteja vazio
    if (isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
        unset($_SESSION['carrinho']);
    }
    // Redireciona para remover os parâmetros da URL
    header('Location: principal.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/principal.css"> 
    <link rel="manifest" href="../src/manifest.json">

    <title>MarketRecycla</title>
</head>

<body>
<?php
include "Include/navbar.php";
include "Include/main.php";
include "Include/footer.php"
?>
   

    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
    if (localStorage.getItem('limpar_carrinho') === 'true') {
        fetch('controllers/limpar_carrinho.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(() => {
            localStorage.removeItem('limpar_carrinho');
            location.reload();
        });
    }
    </script>
</body>

</html>