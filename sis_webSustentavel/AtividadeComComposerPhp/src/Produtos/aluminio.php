
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/Produtos/aluminio.css"> <!-- Link para seu CSS -->
    <title>MarketRecycla</title>
</head>

<body>

<?php
include 'navbar.php';
include 'main.php'
?>
 

    <aside>
        <h2>Alumínios</h3>
            <ul style="font-size: 25px; font-weight: bold;">Categorias</ul>
            <a href="#"><li>Latas de Bebidas</li></a>
            <a href="#"><li >Embalagens de alimentos</li></a>
            <a href="#"><li>Resíduos de Processamento</li></a>
            <a href="#"><li>Latões e Barris</li></a>

            <div class="container">
        <h2>Preço Max</h2>
        <div id="preco">R$ 100,00</div>
        <input type="range" id="precoSlider" min="0" max="500" value="100" class="slider">
    </div>

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
        <img class="figura" src="../imagens/aluminio.jfif">

        <p class="descrição">Embalgem de Alumínio c/ tampa 1150ml 5un</p>

        <p class="preço">R$ 10,<sub>95</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"><button onclick="adicionarAoCarrinho(4)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Jd Soraia | Agora 19:29</p>
    </div>

    <div class="produto2">
        <img class="figura" src="../imagens/papelaluminio.jpg">

        <p class="descrição">Papel aluminio 50 metros</p>

        <p class="preço">R$ 10,<sub>00</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"> <button onclick="adicionarAoCarrinho(3)">Comprar</button></a>
        

        <p class="endereco">Guarulhos | 11/11/2024 9:23</p>
    </div>

    <div class="produto3">
        <img class="figura" src="../imagens/barrilaluminio.webp">

        <p class="descrição">Barril de Alumínio 30L</p>

        <p class="preço">R$ 200,<sub>99</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"><button onclick="adicionarAoCarrinho(2)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Francisco Morato | 2/10/2024 13:30</p>
    </div>

    <div class="produto4">
        <img class="figura" src="../imagens/latinha.webp">

        <p class="descrição">Latinha 400ml</p>

        <p class="preço">R$ 5,<sub>00</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"><button onclick="adicionarAoCarrinho(1)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Itaim Paulista | 5/11/2024 9:00</p>
    </div>
    </div>

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