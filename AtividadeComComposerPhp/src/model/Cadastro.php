<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Cadastro {
    private $usuario;
    private $senha;
    private $email;
    private $cpf;

    public function __construct($usuario, $senha, $email, $CPF) {

        $this->usuario = $usuario;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT); // Hash da senha
    }

    public function cadastrar() {
        try {
            $pdo = ConnectionFactory::getConnection();
            // Prepara a consulta para inserir o novo usuário
            $stmt = $pdo->prepare("INSERT INTO usuarios (usuario, senha , email , cpf) VALUES (:usuario, :senha, :email, :cpf)");
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->execute();

            return 'Usuário cadastrado com sucesso!';
        } catch (PDOException $e) {
            return 'Erro ao cadastrar usuário: ' . $e->getMessage();
        }
    }
}