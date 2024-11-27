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
            <a href="#"><li >Aço</li></a>
            <a href="#"><li>Cobre</li></a>
            <a href="#"><li>Dispositivos Menores</li></a>
            <a href="#"><li>Eletrônicos</li></a>

            

    <script>
        const precoDisplay = document.getElementById("preco");
        const precoSlider = document.getElementById("precoSlider");

        precoSlider.addEventListener("input", function() {
            let valor = precoSlider.value;
            precoDisplay.innerText = `R$ ${parseFloat(valor).toFixed(2)}`;
        });
    </script>
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
        <img class="figura" src="../../imagens/caixadesom.jpg">

        <p class="descrição">Caixa de Som JBL</p>

        <p class="preço">R$ 150,<sub>00</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(6)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Santa Ifgênia | Hoje 11:10</p>
    </div>

    <div class="produto3">
        <img class="figura" src="../../imagens/mouse.jpg">

        <p class="descrição">Mouse usado</p>

        <p class="preço">R$ 10,<sub>99</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(7)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Santa Ifgênia | 1/11/2024</p>
    </div>

    <div class="produto4">
        <img class="figura" src="../../imagens/copocobre.webp">

        <p class="descrição">Copo de Cobre</p>

        <p class="preço">R$ 9,<sub>99</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"> <button onclick="adicionarAoCarrinho(8)">Comprar</button></a>
        

        <p class="endereco">Itaquaquecetuba | Hoje 11:10</p>
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