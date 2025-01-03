<?php
namespace App\model;

use App\persistence\ConnectionFactory;
use PDO;
use PDOException;

// Exibe erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Login {
    private $login;
    private $pdo;

    public function __construct($login = null) {
        $this->login = $login;
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname=db_name', 'root', '');
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function entrar() : void {
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $nome = htmlspecialchars(trim($_POST["nome"]));
            $senha = htmlspecialchars(trim($_POST["senha"]));

            $stmt = $this->pdo->prepare("SELECT * FROM usuario WHERE nome = :nome AND senha = :senha");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                $result = $stmt->fetch(\PDO::FETCH_ASSOC);

                // Debug: Verifique o hash da senha
                var_dump($senha, $result['senha']); // Exibe a senha e o hash

                if (password_verify($senha, $result['senha'])) {
                    
                } else {
                    header("Location: principal.php");
                    exit();
                }
            } else {
                // Retorna a mensagem de erro como uma string
                echo "<div class='errologin'>Usuário ou senha incorretos</div>"
                
                ;
            }
        }
    }
}