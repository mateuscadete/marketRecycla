<?php
session_start();
header('Content-Type: application/json');

require_once '../persistence/ConnectionFactory.php';

try {
    // Conecta ao banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=db_name', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Limpa todos os pedidos da tabela
    $stmt = $pdo->prepare("DELETE FROM pedido");
    $stmt->execute();

    // Limpa também a sessão
    if(isset($_SESSION['carrinho'])) {
        $_SESSION['carrinho'] = array();
        unset($_SESSION['carrinho']);
    }
    
    // Força a gravação das alterações
    session_write_close();
    
    echo json_encode([
        'status' => 'success',
        'message' => 'Carrinho esvaziado com sucesso',
        'pedidos_removidos' => $stmt->rowCount()
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Erro ao limpar o carrinho: ' . $e->getMessage()
    ]);
} 