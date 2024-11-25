<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Cadastro {
    private $nome;
    private $senha;
    private $email;
    private $cpf;

   

    public function __construct($usuario, $senha, $email, $cpf) {

        $this->nome = $usuario;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->senha = $senha;
    }

    public function cadastrar() {
        try {
            $pdo = ConnectionFactory::getConnection();
            
            // Criptografa a senha usando password_hash
            $senhaHash = password_hash($this->senha, PASSWORD_DEFAULT);
            
            // Prepara a consulta para inserir o novo usuário
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, senha, email, cpf) VALUES (:nome, :senha, :email, :cpf)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':senha', $senhaHash); // Usa a senha criptografada
            $stmt->execute();

            header("Location:principal.php");
            exit;
        } catch (PDOException $e) {
            return 'Erro ao cadastrar usuário: ' . $e->getMessage();
        }
    }
}