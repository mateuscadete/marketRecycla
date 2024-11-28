<?php
session_start();
header('Content-Type: application/json');

try {
    // Limpa o carrinho
    $_SESSION['carrinho'] = [];
    
    // Força a destruição da variável
    unset($_SESSION['carrinho']);
    
    // Força a sessão a ser salva
    session_write_close();
    
    // Inicia uma nova sessão para verificar
    session_start();
    
    // Verifica se o carrinho está realmente vazio
    $carrinhoVazio = !isset($_SESSION['carrinho']) || empty($_SESSION['carrinho']);
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Carrinho limpo com sucesso',
        'carrinho_vazio' => $carrinhoVazio
    ]);

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
} 