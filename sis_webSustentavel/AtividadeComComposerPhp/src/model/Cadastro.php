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
            // Prepara a consulta para inserir o novo produto
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, senha , email , cpf) VALUES (:nome, :senha, :email, :cpf)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':cpf', $this->cpf);
            $stmt->bindParam(':senha', $this->senha);
            $stmt->execute();


            header("Location:principal.html");
            exit;
        } catch (PDOException $e) {
            return 'Erro ao cadastrar usuário: ' . $e->getMessage();
        }
    }   
}