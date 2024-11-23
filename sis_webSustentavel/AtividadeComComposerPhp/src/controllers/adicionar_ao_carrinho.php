<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../model/Carrinho.php';

header('Content-Type: application/json');

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);
        
        if (isset($data['idProduto']) && isset($data['qtde'])) {
            $carrinho = new App\model\Carrinho();
            $carrinho->adicionarProduto($data['idProduto'], $data['qtde']);
        } else {
            echo json_encode([
                "success" => false,
                "error" => "Dados incompletos. Necessário idProduto e qtde",
                "received_data" => $data
            ]);
        }
    } else {
        echo json_encode([
            "success" => false,
            "error" => "Método não permitido"
        ]);
    }
} catch (Exception $e) {
    error_log('Erro no adicionar_ao_carrinho.php: ' . $e->getMessage());
    echo json_encode([
        "success" => false,
        "error" => "Erro interno: " . $e->getMessage()
    ]);
} 