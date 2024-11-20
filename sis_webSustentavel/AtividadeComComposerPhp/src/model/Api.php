<?php
require_once '../vendor/autoload.php';

use App\model\Produto;
use App\model\Carrinho;
use App\persistence\ConnectionFactory;



// Exemplo de endpoint para adicionar um produto ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produtoId'], $_POST['quantidade'])) {
    try {
        $pdo = ConnectionFactory::getConnection();
        $carrinho = new Carrinho($pdo);
        $carrinho->addProdutoFromDatabase($_POST['produtoId'], $_POST['quantidade']);
        echo json_encode(['success' => true, 'message' => 'Produto adicionado ao carrinho!']);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
