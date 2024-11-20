<?php
namespace App\model;

use PDO;

class Carrinho {
    private $pdo;
    private $produtos = [];

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Método para adicionar produto ao carrinho a partir do banco de dados
    public function addProdutoFromDatabase($produtoId, $quantidade) {
        // Consulta SQL para buscar o produto no banco de dados
        $stmt = $this->pdo->prepare("SELECT id, nome, descricao, preco FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $produtoId, PDO::PARAM_INT);
        $stmt->execute();

        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($produto) {
            // Cria uma instância do produto e adiciona ao carrinho
            $produtoObj = new Produto($produto['id'], $produto['nome'], $produto['descricao'], $quantidade, $produto['preco']);
            $this->produtos[] = $produtoObj;
        } else {
            throw new Exception("Produto não encontrado.");
        }
    }

    // Método para obter todos os produtos do carrinho
    public function getCarrinho() {
        return $this->produtos;
    }
}
