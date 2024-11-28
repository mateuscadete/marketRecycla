<?php
// Inicia a sessão
session_start();

// Remove todas as variáveis de sessão
$_SESSION = array();

// Destrói o cookie da sessão
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
}

// Destrói a sessão
session_destroy();

echo json_encode(['status' => 'success']); 