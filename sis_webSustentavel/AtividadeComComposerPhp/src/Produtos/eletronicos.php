<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="../imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Style/Produtos/eletronicos.css"> <!-- Link para seu CSS -->
    <title>Eletrônicos e Metais - MarketRecycla</title>
</head>

<body>
    
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <!-- Adicionando fixed-top -->
        <button type="button" class="btn btn-link text-light mr-2">
            <img src="../imagens/MarketRecycla.png" alt="menu" class="logo">
        </button>
        <a class="navbar-brand" href="../principal.php">MarketRecycla</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="../sobre.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contato.php">Contato</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

            <div class="btn-group mx-3" role="group" aria-label="Basic example">
            <a href="../produto.php">    
            <button type="button" class="btn btn-link text-light">Cadastrar Produto</button>
            </a>

            <a href="../carrinho.php">

                
                    <button type="button" class="btn btn-link text-light">

                        <img src="../imagens/Shopping cart.png" alt="Cadastrar Produto" class="car">
                    </button>
   </a>

            </div>

            <a href="../cadastro.php">
                <div class="perfil">
                    <button type="button" class="btn btn-link text-light ml-3">
                        <img src="../imagens/Generic avatar.png" alt="Perfil" class="ft-perfil">
                    </button>
                </div>
            </a>
        </div>
</nav>
    <main>
        <div class="container-fluid">
            <div class="d-flex no-gutters">


                <div class="image-container">
                    <a href="plastico.php">
                        <img src="../imagens/Plastico.png" alt="Plástico" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Plástico</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="vidro.php">
                        <img src="../imagens/Vidro.png" alt="Vidro" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Vidro</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="aluminio.php">
                        <img src="../imagens/Metal.png" alt="Metal" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Alumínio</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="papel.php">
                        <img src="../imagens/Papel.png" alt="Papel" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Papel</div>
                </div>
                </a>


                <div class="image-container">
                    <a href="eletronicos.php">
                        <img src="../imagens/Eletronicos.png" alt="Eletrônicos" class="img-fluid">
                        <div class="overlay"></div>
                        <div class="caption">Eletrônicos e Metais</div>
                </div>
                </a>

            </div>
        </div>
    </main>
    <aside>
        <h2>Eletrônicos e Metais</h3>
            <ul style="font-size: 25px; font-weight: bold;">Categorias</ul>
            <a href="#"><li >Aço</li></a>
            <a href="#"><li>Cobre</li></a>
            <a href="#"><li>Dispositivos Menores</li></a>
            <a href="#"><li>Eletrônicos</li></a>

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
        <img class="figura" src="../imagens/lixeirametal.jpg">

        <p class="descrição">Lixeira 50L Lata de Lixo Americana </p>

        <p class="preço">R$ 270,<sub>00</sub></p>
        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"><button onclick="adicionarAoCarrinho(5)">Comprar</button></a
        

        <p class="endereco">São Paulo, Av. Juscelino Kubitschek | 21/10/2024 21:00</p>
    </div>

    <div class="produto2">
        <img class="figura" src="../imagens/caixadesom.jpg">

        <p class="descrição">Caixa de Som JBL</p>

        <p class="preço">R$ 150,<sub>00</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"><button onclick="adicionarAoCarrinho(6)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Santa Ifgênia | Hoje 11:10</p>
    </div>

    <div class="produto3">
        <img class="figura" src="../imagens/mouse.jpg">

        <p class="descrição">Mouse usado</p>

        <p class="preço">R$ 10,<sub>99</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"><button onclick="adicionarAoCarrinho(7)">Comprar</button></a>
        

        <p class="endereco">São Paulo, Santa Ifgênia | 1/11/2024</p>
    </div>

    <div class="produto4">
        <img class="figura" src="../imagens/copocobre.webp">

        <p class="descrição">Copo de Cobre</p>

        <p class="preço">R$ 9,<sub>99</sub></p>

        <input type="number" id="qtde" min="1" value="1">
        <a href="../carrinho.php"> <button onclick="adicionarAoCarrinho(8)">Comprar</button></a>
        

        <p class="endereco">Itaquaquecetuba | Hoje 11:10</p>
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
                alert('Erro ao adicionar produto ao carrinho');
            });
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>