
<?php
require_once '../../vendor/autoload.php';

use App\model\Api;

// Inicializa a mensagem de retorno
$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados enviados via POST
    $nome = $_POST['nome'] ?? '';
    $qtde = $_POST['qtde'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = $_POST['preco'] ?? '';

    // Validação básica dos campos
    if (empty($nome) || empty($qtde) || empty($descricao) || empty($preco)) {
        $mensagem = 'Todos os campos devem ser preenchidos.';
    } else {
        try {
            // Criação do objeto Produto (ajuste conforme sua classe)
            $produto = new Produto($nome, $qtde, $descricao, $preco);

            // Cadastra o produto no carrinho chamando o método da API
            $mensagem = $produto->adicionarAoCarrinho(); // Substitua pelo método correto na classe Produto
        } catch (Exception $e) {
            $mensagem = 'Erro ao adicionar o produto ao carrinho: ' . $e->getMessage();
        }
    }
}

?>
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
<div class="content"></div>
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
        <h2>Alumínios</h3>
            <ul style="font-size: 25px; font-weight: bold;">Categorias</ul>
            <a href="#"><li>Latas de Bebidas</li></a>
            <a href="#"><li style="font-weight: bold;">Embalagens de alimentos</li></a>
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

        <button class="comprar" type="submit">Comprar</button>
        

        <p class="endereco">São Paulo, Jd Soraia | Agora 19:29</p>
    </div>

    <div class="produto2">
        <img class="figura" src="../imagens/papelaluminio.jpg">

        <p class="descrição">Papel aluminio 50 metros</p>

        <p class="preço">R$ 10,<sub>00</sub></p>

        <button class="comprar" type="submit">Comprar</button>
        

        <p class="endereco">Guarulhos | 11/11/2024 9:23</p>
    </div>

    <div class="produto3">
        <img class="figura" src="../imagens/barrilaluminio.webp">

        <p class="descrição">Barril de Alumínio 30L</p>

        <p class="preço">R$ 200,<sub>99</sub></p>

        <button class="comprar" type="submit">Comprar</button>
        

        <p class="endereco">São Paulo, Francisco Morato | 2/10/2024 13:30</p>
    </div>

    <div class="produto4">
        <img class="figura" src="../imagens/latinha.webp">

        <p class="descrição">Latinha 400ml</p>

        <p class="preço">R$ 5,<sub>00</sub></p>

        <button class="comprar" type="submit">Comprar</button>
        

        <p class="endereco">São Paulo, Itaim Paulista | 5/11/2024 9:00</p>
    </div>
    </div>

    <footer class="bg-dark text-light text-center py-3 mt-5">
        <p>&copy; 2024 MarketRecycla. Todos os direitos reservados.</p>
    </footer>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>