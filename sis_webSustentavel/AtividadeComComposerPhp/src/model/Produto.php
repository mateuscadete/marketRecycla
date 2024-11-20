<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Produto {
    private $nome;
    private $qtde;
    private $descricao;
    private $preco;
    private $pdo;

    public function __construct($nome = null, $qtde = null, $descricao = null, $preco = null) {
        $this->nome = $nome;
        $this->qtde = $qtde;
        $this->descricao = $descricao;
        $this->preco = $preco;

        try {
            $this->pdo = ConnectionFactory::getConnection();  // Estabelecendo a conexão com o banco
        } catch (PDOException $e) {
            echo 'Erro na conexão: ' . $e->getMessage();
        }
    }

    // Método para cadastrar produto
    public function cadastrar_produto() {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO produto (nome, qtde, descricao, preco) VALUES (:nome, :qtde, :descricao, :preco)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':qtde', $this->qtde);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->bindParam(':preco', $this->preco);
            $stmt->execute();

            header("Location:tela.php");  // Redireciona após inserir o produto
            exit;
        } catch (PDOException $e) {
            return 'Erro ao cadastrar produto: ' . $e->getMessage();
        }
    }

    // Método para deletar o produto
    public function deletar_produto($id) {
        try {
            // Verificar se o ID do produto é válido antes de tentar deletar
            if (empty($id)) {
                return "ID do produto não pode estar vazio.";
            }

            // Prepara a consulta SQL para deletar o produto
            $stmt = $this->pdo->prepare("DELETE FROM produto WHERE idProduto = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);  // Corrige o parâmetro de vinculação

            $stmt->execute();

            // Verifica se o produto foi deletado
            if ($stmt->rowCount() > 0) {
                header("Location: ../principal.php");  // Redireciona para a página principal após a exclusão
                exit;
            } else {
                header("Location: ../principal.php");  // Redireciona para a página principal após a exclusão
                exit;
            }
        } catch (PDOException $e) {
            return 'Erro ao deletar produto: ' . $e->getMessage();
        }
    }
}
