<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Style/Produtos/eletronicos.css"> <!-- Link para seu CSS -->
    <title>Eletrônicos e Metais - MarketRecycla</title>
</head>

<body>
    
<?php
include '../navbar.php';
include '../main.php'
?>
 

    <aside>
        <h2>Eletrônicos e Metais</h3>
            <ul style="font-size: 25px; font-weight: bold;">Categorias</ul>
            <a href="aço.php"><li >Aço</li></a>
            <a href="cobre.php"><li>Cobre</li></a>
            <a href="menores.php"><li>Dispositivos Menores</li></a>
            <a href="maiores.php"><li>Eletrônicos</li></a>         

    </aside>

    <div class="produto">
        <img class="figura" src="../../imagens/lixeirametal.jpg">

        <p class="descrição">Lixeira 50L Lata de Lixo Americana </p>

        <p class="preço">R$ 270,<sub>00</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(5)">Comprar</button></a
        

        <p class="endereco">São Paulo, Av. Juscelino Kubitschek | 21/10/2024 21:00</p>
    </div>

    <div class="produto2">
        <img class="figura" src="../../imagens/mesa.jpg">

        <p class="descrição">Mesa de Aço</p>

        <p class="preço">R$ 110,<sub>00</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(6)">Comprar</button></a>
        

        <p class="endereco">Guarulhos | Hoje 16:10</p>
    </div>

    <div class="produto3">
        <img class="figura" src="../../imagens/bandejaaço.jpg">

        <p class="descrição">Bandeja Aço</p>

        <p class="preço">R$ 24,<sub>99</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(7)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Penha | Hoje 11:40</p>
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
                alert('Erro ao adicionar produto ao carrinho');
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>