<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Carrinho {
    private $pdo;

    public function __construct() {
        try {
            // Configuração para conexão com o banco de dados
            $this->pdo = new \PDO('mysql:host=localhost;dbname=db_name', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    // Função para adicionar produto ao carrinho
    public function adicionarProduto($idProduto, $qtde) : void {
        try {
            // Verifica se o produto já existe no carrinho
            $stmt = $this->pdo->prepare("SELECT * FROM pedido WHERE idProduto = :idProduto");
            $stmt->bindParam(':idProduto', $idProduto);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Se o produto já existe no carrinho, atualiza a quantidade
                $stmt = $this->pdo->prepare("UPDATE pedido SET qtde = qtde + :qtde WHERE idProduto = :idProduto");
                $stmt->bindParam(':qtde', $qtde);
                $stmt->bindParam(':idProduto', $idProduto);
                $stmt->execute();
            } else {
                // Se o produto não existe no carrinho, insere um novo registro
                $stmt = $this->pdo->prepare("INSERT INTO pedido (idProduto, qtde) VALUES (:idProduto, :qtde)");
                $stmt->bindParam(':idProduto', $idProduto);
                $stmt->bindParam(':qtde', $qtde);
                $stmt->execute();
            }

            // Update the success response to include redirect information
            echo json_encode([
                "success" => true, 
                "message" => "Produto adicionado ao carrinho",
                "redirect" => "../carrinho.php"
            ]);
        } catch (PDOException $e) {
            echo json_encode([
                "success" => false, 
                "error" => "Erro ao adicionar produto ao carrinho: " . $e->getMessage()
            ]);
        }
    }

    // Função para remover um produto do carrinho
    public function removerProduto($idProduto) : void {
        try {
            $stmt = $this->pdo->prepare("DELETE FROM pedido WHERE idProduto = :idProduto");
            $stmt->bindParam(':idProduto', $idProduto);
            $result = $stmt->execute();
            
            if ($result) {
                echo json_encode(["success" => true, "message" => "Produto removido do carrinho"]);
            } else {
                echo json_encode(["success" => false, "error" => "Não foi possível remover o produto"]);
            }
        } catch (PDOException $e) {
            echo json_encode(["success" => false, "error" => "Erro ao remover produto do carrinho: " . $e->getMessage()]);
        }
    }

    // Função para listar os produtos no carrinho
    public function listarCarrinho() {
        try {
            $stmt = $this->pdo->query("SELECT p.*, pd.qtde 
                                      FROM pedido pd 
                                      JOIN produto p ON pd.idProduto = p.idProduto");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return ["success" => false, "error" => "Erro ao listar produtos no carrinho: " . $e->getMessage()];
        }
    }
}
