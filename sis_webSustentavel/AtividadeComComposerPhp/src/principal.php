

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Style/principal.css"> <!-- Link para seu CSS -->
    <link rel="manifest" href="../src/manifest.json">

    <title>MarketRecycla</title>
</head>

<body>
<?php
include "Include/navbar.php";
?>
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
                        <div class="caption">Alumínio</div>
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
                        <div class="caption">Eletrônicos e Metais</div>
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