<?php
require_once  __DIR__ .'/../vendor/autoload.php';
use App\model\Usuario;
use App\model\Login;

use App\persistence\ConnectionFactory;
$Carlos = new Usuario();
$Carlos->nome = 'Carlos Almeida';

$conn = ConnectionFactory::getConnection();

echo print_r(value:$conn, return:true);
          