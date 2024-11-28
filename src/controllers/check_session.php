<?php
session_start();
header('Content-Type: application/json');

// Força a sessão a ser atualizada
session_write_close();
session_start();

echo json_encode([
    'status' => 'success',
    'session_active' => session_status() === PHP_SESSION_ACTIVE,
    'cart_empty' => empty($_SESSION['carrinho'])
]); 