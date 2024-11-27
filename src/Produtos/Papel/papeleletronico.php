<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Style/Produtos/papel.css"> <!-- Link para seu CSS -->
    <title>Papel - MarketRecycla</title>
</head>

<body>
    
<?php
include '../navbar.php';
include '../main.php'
?>
 

    <aside>
        <h2>Papel</h3>
            <ul style="font-size: 25px; font-weight: bold;">Categorias</ul>
            <a href="papelao.php"><li >Papelão</li></a>
            <a href="papelsimples.php"><li>Papel Simples</li></a>
            <a href="caixa.php"><li>Caixas de Embalagem</li></a>
            <a href="papeleletronico.php"><li>Papelão de Produtos Eletrônico</li></a>
        
    </aside>

    <div class="produto">
        <img class="figura" src="../../imagens/caixacelular.jpg">
        <p class="descrição">Caixa de Celular</p>
        <p class="preço">R$ 11,<sub>99</sub>un</p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(10)">Comprar</button></a>       
        <p class="endereco">São Paulo, Santana | 21/10/2024 8:30</p>
    </div>

    <div class="produto2">
        <img class="figura" src="../../imagens/caixaeletronicos.jpg">
        <p class="descrição">Caixinha Quadrada</p>
        <p class="preço">R$ 10,<sub>99</sub>un</p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(10)">Comprar</button></a>       
        <p class="endereco">São Paulo, São Miguel | Hoje 10:30</p>
    </div>

    <div class="produto3">
        <img class="figura" src="../../imagens/embalagem.jpeg">
        <p class="descrição">Caixa Embalagem</p>
        <p class="preço">R$ 5,<sub>00</sub> un</p>
        <input type="number" id="qtde" min="1" value="1">
       <a href="../../carrinho.php"> <button onclick="adicionarAoCarrinho(11)">Comprar</button></a>
        <p class="endereco">São Paulo, Butantã | 25/10/2024 9:25</p>
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