<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Login {
    private $nome;
    private $senha;

    public function __construct($nome, $senha) {
        
        $this->nome = $nome;
        $this->senha = $senha;
    }

    public function entrar() {
        try {
            $pdo = ConnectionFactory::getConnection();
            // Prepare e execute a consulta
            $stmt = $pdo->prepare("SELECT nome, senha FROM usuario WHERE nome = :nome");
            $stmt->bindValue(':nome', $this->nome, PDO::PARAM_STR); // Usando bindValue
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Verifique se o usuário existe
            if ($result && password_verify($this->senha, $result['senha'])) {
                // Redireciona para a página desejada
                header('Location: principal.html');
                exit; // Para garantir que o script não continue
            }
    
            return 'Usuário ou senha incorretos';
        } catch (PDOException $e) {
            return 'Erro ao conectar ao banco de dados: ' . $e->getMessage();
        }
    }
}