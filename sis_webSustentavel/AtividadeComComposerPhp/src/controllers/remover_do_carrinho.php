<?php
require_once '../model/Carrinho.php';

try {
    if (!isset($_POST['idProduto'])) {
        throw new Exception('ID do produto não fornecido');
    }

    $idProduto = intval($_POST['idProduto']);
    $carrinho = new App\model\Carrinho();
    
    $carrinho->removerProduto($idProduto);
    
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
} 