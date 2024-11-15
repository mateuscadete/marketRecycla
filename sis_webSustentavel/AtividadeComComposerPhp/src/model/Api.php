<?php
class Carrinho {

    private $pdo;

    // Construtor para conectar ao banco de dados
    public function __construct($pdo) {
        $this->pdo = $pdo;
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = ['produto' => [], 'total' => 0];
        }
    }

    // Adicionar produto ao carrinho
    public function add(Produto $produto) {
        $inCarrinho = false;
        
        // Se já tiver produtos no carrinho, verifica se o produto já está presente
        if (count($this->getCarrinho()['produto']) > 0) {
            foreach ($this->getCarrinho()['produto'] as $produtoInCarrinho) {
                // Se o produto já está no carrinho, aumenta a quantidade
                if ($produtoInCarrinho->getId() === $produto->getId()) {
                    $qtd = $produtoInCarrinho->getQtd() + $produto->getQtd();
                    $produtoInCarrinho->setQtd($qtd);
                    $inCarrinho = true;
                    break;
                }
            }
        }

        // Se o produto não estiver no carrinho, adiciona ele
        if (!$inCarrinho) {
            $this->setProdutoInCarrinho($produto);
        }

        // Atualiza o total do carrinho
        $this->setTotal($produto);
    }

    // Atualiza a lista de produtos no carrinho
    private function setProductsInCarrinho(Produto $produto) {
        $_SESSION['carrinho']['produto'][] = $produto;
    }

    // Atualiza o total do carrinho
    private function setTotal(Produto $produto) {
        $_SESSION['carrinho']['total'] += $produto->getPreco() * $produto->getQtd();
    }

    // Remove produto do carrinho (não implementado)
    public function remove($produtoId) {
        $updatedProduto = [];
        foreach ($this->getCarrinho()['produto'] as $produto) {
            if ($produto->getId() !== $produtoId) {
                $updatedProduto[] = $produto;
            }
        }
        $_SESSION['carrinho']['produto'] = $updatedProduto;
    }

    // Retorna os dados do carrinho
    public function getCarrinho() {
        return $_SESSION['carrinho'];
    }

    // Função para buscar um produto no banco de dados pelo ID
    public function fetchProdutoFromDatabase($produtoId) {
        // Faz a consulta ao banco de dados usando PDO
        $stmt = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $produtoId);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Produto($row['id'], $row['nome'], $row['preco'], $row['qtd']);
        }
        
        return null; // Produto não encontrado
    }

    // Exemplo de função para adicionar produto ao carrinho a partir do banco de dados
    public function addProdutoFromDatabase($produtoId, $qtd) {
        // Busca o produto do banco
        $produto = $this->fetchProdutoFromDatabase($produtoId);

        if ($produto) {
            $produto->setQtd($qtd);
            $this->add($produto); // Adiciona o produto ao carrinho
        }
    }
}
