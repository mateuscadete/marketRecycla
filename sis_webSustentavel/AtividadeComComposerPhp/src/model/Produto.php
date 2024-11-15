<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

class Produyo {
    private $id;
    private $nome;
    private $descricao;
    private $qtd;

    public function __construct($id, $nome, $descricao, $qtd) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->qtd = $qtd;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getdescricao() {
        return $this->descricao;
    }

    public function getQtd() {
        return $this->qtd;
    }

    public function setQtd($qtd) {
        $this->qtd = $qtd;
    }
}

// Exemplo de uso:

try {
    // Configuração de conexão PDO com o banco de dados
    $pdo = new PDO('mysql:host=localhost;dbname=db_name', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Inicializa a sessão e o carrinho
    session_start();
    $carrinho = new Carrinho($pdo);

    // Adiciona produto ao carrinho a partir do banco de dados
    $carrinho->addProdutoFromDatabase(1, 2); // Exemplo: produto com ID 1 e quantidade 2
    
    // Exibe o carrinho
    print_r($carrinho->getCarrinho());

} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados: " . $e->getMessage();
}