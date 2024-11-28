<?php
session_start();
header('Content-Type: application/json');

try {
    // Verifica se existe um carrinho na sessão
    if (!isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = [];
    }

    // Calcula o total do carrinho
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['preco'] * $item['quantidade'];
    }

    // Retorna o total formatado com 2 casas decimais
    echo json_encode([
        'status' => 'success',
        'total' => number_format($total, 2, '.', '')
    ]);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
} 