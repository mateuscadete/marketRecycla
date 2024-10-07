<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Cadastro {
    private $usuario;
    private $senha;

    public function __construct($usuario, $senha) {
        if (empty($usuario) || empty($senha)) {
            throw new \InvalidArgumentException('Usuário e senha são obrigatórios.');
        }

        $this->usuario = $usuario;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha
    }

    public function cadastrar() {
        try {
            $pdo = ConnectionFactory::getConnection();
            // Prepara a consulta para inserir o novo usuário
            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha) VALUES (:usuario, :senha)");
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->execute();

            return 'Usuário cadastrado com sucesso!';
        } catch (PDOException $e) {
            return 'Erro ao cadastrar usuário: ' . $e->getMessage();
        }
    }
}