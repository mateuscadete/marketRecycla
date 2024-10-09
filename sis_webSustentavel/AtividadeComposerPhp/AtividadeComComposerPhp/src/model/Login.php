<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Login {
    private $usuario;
    private $senha;

    public function __construct($usuario, $senha) {
        
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    public function entrar() {
        try {
            $pdo = ConnectionFactory::getConnection();
            // Prepare e execute a consulta
            $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE usuario = :usuario");
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifique se o usuário existe
            if ($result && password_verify($this->senha, $result['senha'])) {
                header('Location: index.html');
                exit;
            }

            return 'Usuário ou senha incorretos';
        } catch (PDOException $e) {
            return 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
        }
    }
}