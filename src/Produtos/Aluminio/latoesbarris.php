<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Style/Produtos/aluminio.css"> <!-- Link para seu CSS -->
    <title>MarketRecycla</title>
</head>

<body>

<?php
include '../navbar.php';
include '../main.php'
?>
 

    <aside>
        <h2>Alumínios</h3>
            <ul style="font-size: 25px; font-weight: bold;">Categorias</ul>
            <a href="latasbebidas.php"><li>Latas de Bebidas</li></a>
            <a href="embalagens.php"><li >Embalagens de alimentos</li></a>
            
            <a href="latoesbarris.php"><li style="font-weight:100px;">Latões e Barris</li></a>


    </aside>

    <div class="produto">
        <img class="figura" src="../../imagens/barrilaluminio.webp">

        <p class="descrição">Barril de Alumínio 30L</p>

        <p class="preço">R$ 200,<sub>99</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button class="comprar" onclick="adicionarAoCarrinho(2)">Comprar</button></a>
        <p class="endereco">São Paulo, Francisco Morato | 2/10/2024 13:30</p>
    </div>

    <div class="produto2">
        <img class="figura" src="../../imagens/barrilheineken.png">
        <p class="descrição">Barril Heineken 250l</p>
        <p class="preço">R$ 220,<sub>00</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"> <button class="comprar" onclick="adicionarAoCarrinho(3)">Comprar</button></a>
        <p class="endereco">São Paulo, Brás | 26/11/2024 8:30</p>
    </div>

    <div class="produto3">
        <img class="figura" src="../../imagens/latatinta.png">

        <p class="descrição">Lata de Tinta</p>

        <p class="preço">R$ 15,<sub>00</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"> <button class="comprar" onclick="adicionarAoCarrinho(3)">Comprar</button></a>
        

        <p class="endereco">Guarulhos | 30/10/2024 | 16:45</p>
    </div>

    
    </div>

<?php
include '../footer.php'
?>

    <script>
        function adicionarAoCarrinho(idProduto) {
            const quantidade = document.getElementById('qtde').value;
            
            fetch('../controllers/adicionar_ao_carrinho.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    idProduto: idProduto,
                    qtde: parseInt(quantidade)
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log(data.message);
                } else {
                    console.log(data.error);
                }
            })
            .catch(error => {
                console.error('Erro:', error);
                console.log('Erro ao adicionar produto ao carrinho');
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>