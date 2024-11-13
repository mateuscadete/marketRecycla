<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Produto {
    private $nome;
    private $qtde;
    private $descricao;

   

    public function __construct($nome,  $qtde, $descricao) {

        $this->nome = $nome;
        $this->quantidade = $qtde;
        $this->descricao= $descricao;
    }

    public function cadastrar_produto() {
        try {
            $pdo = ConnectionFactory::getConnection();
            // Prepara a consulta para inserir o novo usuário
            $stmt = $pdo->prepare("INSERT INTO produto (nome, qtde, descricao) VALUES (:nome, :qtde, :descricao)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':qtde', $this->quantidade);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->execute();


            header("Location:principal.php");
            exit;
        } catch (PDOException $e) {
            return 'Erro ao cadastrar Produto: ' . $e->getMessage();
        }
    }
}