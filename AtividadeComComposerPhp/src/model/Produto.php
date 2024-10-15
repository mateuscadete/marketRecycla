<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Cadastro_Produto {
    private $nome;
    private $qtd;
    private $descricao;

   

    public function __construct($nome,  $qtd, $descricao) {

        $this->nome = $nome;
        $this->quantidade = $qtd;
        $this->descricao= $descricao;
    }

    public function cadastrar() {
        try {
            $pdo = ConnectionFactory::getConnection();
            // Prepara a consulta para inserir o novo usuário
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, qtd, descricao) VALUES (:nome, :qtd, :descricao)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':qtd', $this->quantidade);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->execute();


            return 'Produto cadastrado com sucesso!';
        } catch (PDOException $e) {
            return 'Erro ao cadastrar Produto: ' . $e->getMessage();
        }
    }
}