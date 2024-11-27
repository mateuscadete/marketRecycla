<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../../imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../Style/Produtos/plastico.css"> <!-- Link para seu CSS -->
    <title>Plástico - MarketRecycla</title>
</head>

<body>

<?php
include '../navbar.php';
include '../main.php'
?>
 
    <aside>
        <h2>Plásticos</h3>
            <ul style="font-size: 25px; font-weight: bold;">Categorias</ul>
            <a href="pet.php"><li >Polietileno Tereftalato (PET)</li></a>
            <a href="pead.php"><li>Polietileno de Alta Densidade (PEAD)</li></a>
            <a href="pvc.php"><li>Polietileno de Vinila (PVC)</li></a>
            <a href="polipropileno.php"><li>Polipropileno</li></a>
            <a href="poliestireno.php"><li>Poliestireno</li></a>

    </aside>

    <div class="produto">
        <img class="figura" src="../../imagens/fitapolipropileno.jpg">

        <p class="descrição">Fita Polipropileno</p>

        <p class="preço">R$ 12, <sub>99</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php">  <button onclick="adicionarAoCarrinho(13)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Vila Oliveira | 3/11/2024 11:29</p>
    </div>

    <div class="produto2">
        <img class="figura" src="../../imagens/Telhaondulada.webp">

        <p class="descrição">Telha Ondulada</p>

        <p class="preço">R$ 35, <sub>50</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"> <button onclick="adicionarAoCarrinho(14)">Comprar</button></a>
        

        <p class="endereco">Guarulhos  | 21/11/2024 16:00</p>
    </div>

    

    <div class="produto3">
        <img class="figura" src="../../imagens/cadeirapolipropileno.webp">

        <p class="descrição">Cadeira Polipropileno</p>

        <p class="preço">R$ 29, <sub>99</sub> Un</p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../../carrinho.php"><button onclick="adicionarAoCarrinho(16)">Comprar</button></a>

        <p class="endereco">Guarulhos | 27/10/2024 19:50</p>
    
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