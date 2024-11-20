<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Produto{
    private $nome;
    private $qtde;
    private $descricao;
    private $preco;

   

    public function __construct($nome, $qtde, $descricao, $preco) {

        $this->nome = $nome;
        $this->qtde = $qtde;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    public function cadastrar_produto() {
        try {
            $pdo = ConnectionFactory::getConnection();
            // Prepara a consulta para inserir o novo produto
            $stmt = $pdo->prepare("INSERT INTO produto (nome, qtde, descricao , preco) VALUES (:nome, :qtde, :descricao, :preco)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':qtde', $this->qtde);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->bindParam(':preco', $this->preco);
            $stmt->execute();


            header("Location:tela.php");
            exit;
        } catch (PDOException $e) {
            return 'Erro ao cadastrar usuário: ' . $e->getMessage();
        }
    }   
}