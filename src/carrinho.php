<?php
require_once __DIR__ . '/../vendor/autoload.php';

require_once 'model/Carrinho.php';

$erro_pagamento = '';
$carrinho = new App\model\Carrinho();
$itens = $carrinho->listarCarrinho();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Style/carrinho.css">
    <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <script>
  const mp = new MercadoPago("YOUR_PUBLIC_KEY");
</script>
</head>

<body>
    <!-- Barra de Navegação -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top"> <!-- Adicionando fixed-top -->
        <button type="button" class="btn btn-link text-light mr-2">
            <img src="imagens/MarketRecycla.png" alt="menu" class="img-fluid">
        </button>
        <a class="navbar-brand" href="principal.php">MarketRecycla</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
               
                <li class="nav-item">
                    <a class="nav-link" href="sobre.php">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contato.php">Contato</a>
                </li>
            </ul>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>

            <div class="btn-group mx-3" role="group" aria-label="Basic example">
            <a href="produto.php">    
            <button type="button" class="btn btn-link text-light">Cadastrar Produto</button>
            </a>

            <a href="carrinho.php">

                
                    <button type="button" class="btn btn-link text-light">

                        <img src="imagens/Shopping cart.png" alt="Cadastrar Produto" class="car">
                    </button>
</a>

            </div>

            <a href="cadastro.php">
                <div class="perfil">
                    <button type="button" class="btn btn-link text-light ml-3">
                        <img src="imagens/Generic avatar.png" alt="Perfil" class="ft-pefil">
                    </button>
                </div>
            </a>
        </div>
</nav>
    <!-- Mantenha sua navbar existente aqui -->

    <div class="cart-container">
        <div class="header">Meu Carrinho 🛒</div>

        <?php if (!empty($itens) && !isset($itens['error'])): ?>
            <?php foreach ($itens as $item): ?>
                <div class="cart-item" data-produto-id="<?php echo $item['idProduto']; ?>">
                    <div class="item-image">
                        <img src="<?php echo htmlspecialchars($item['imagem'] ?? 'imagens/caixa.jpg'); ?>" 
                             alt="<?php echo htmlspecialchars($item['nome']); ?>">
                    </div>
                    <div class="detalhes">
                        <p class="name"><?php echo htmlspecialchars($item['nome']); ?></p>
                        <p class="price">
                            <span class="preco" data-price="<?php echo $item['preco']; ?>">
                                R$ <?php echo number_format($item['preco'], 2, ',', '.'); ?>
                            </span>
                        </p>

                        <div class="container">
                            <div class="botões">
                                <button class="menos">-</button>
                                <span class="quantidade"><?php echo $item['qtde']; ?></span>
                                <button class="mais">+</button>
                            </div>

                            <div class="quantity-bar">
                                <div class="quantity-fill" style="width: 1%;"></div>
                            </div>

                            <button type="button" class="remover" 
                                    onclick="removerProduto(<?php echo $item['idProduto']; ?>)">
                                Remover
                            </button>
                        </div>
                    </div>
                </div>
                <div class="divider"></div>
            <?php endforeach; ?>

            <div class="cart-footer">
                <p class="total">Total R$ <span id="valorTotal">0,00</span></p>
                <?php if (isset($erro_pagamento)): ?>
                    <div class="alert alert-danger">
                        <?php echo htmlspecialchars($erro_pagamento); ?>
                    </div>
                <?php endif; ?>
                <form method="POST" action="">
                <button type="button" onclick="window.location.href='pagamento.php'" class="comprar">Finalizar Compra</button>
                </form>
            </div>

        <?php else: ?>
            <div class="empty-cart">
                <p>Seu carrinho está vazio.</p>
                <a href="principal.php" class="btn-continuar">Voltar para a página principal</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Mantenha seus scripts existentes -->
    <script>
        function removerProduto(idProduto) {
            if (confirm('Tem certeza que deseja remover este item?')) {
                const formData = new FormData();
                formData.append('idProduto', idProduto);

                fetch('controllers/remover_do_carrinho.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    try {
                        const result = JSON.parse(data);
                        if (result.success) {
                            // Remove the item from the DOM
                            const itemElement = document.querySelector(`[data-produto-id="${idProduto}"]`);
                            if (itemElement) {
                                itemElement.remove();
                            }
                            // Reload the page to update the cart
                            window.location.reload();
                        } else {
                            alert(result.error || 'Erro ao remover produto');
                        }
                    } catch (e) {
                        console.error('Erro ao processar resposta:', e);
                        alert('Erro ao remover produto');
                    }
                })
                .catch(error => {
                    console.error('Erro:', error);
                    alert('Erro ao remover produto');
                });
            }
        }

        // Função para atualizar o total
        function atualizarTotal() {
            const itens = document.querySelectorAll('.cart-item');
            let total = 0;

            itens.forEach(item => {
                const preco = parseFloat(item.querySelector('.preco').dataset.price);
                const quantidade = parseInt(item.querySelector('.quantidade').textContent);
                total += preco * quantidade;
            });

            document.getElementById('valorTotal').textContent = 
                total.toLocaleString('pt-BR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
        }

        // Chamar atualização do total quando a página carregar
        document.addEventListener('DOMContentLoaded', atualizarTotal);
    </script>
</body>
</html>
