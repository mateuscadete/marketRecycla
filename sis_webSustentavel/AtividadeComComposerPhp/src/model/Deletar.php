<?php
require_once '../../vendor/autoload.php'; // Certifique-se de carregar o autoload

use App\model\Produto;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura o ID do produto a ser deletado
    $idProduto = $_POST['idProduto'] ?? '';

    if (!empty($idProduto)) {
        // Instancia a classe Produto
        $produto = new Produto();
        $mensagem = $produto->deletar_produto($idProduto);  // Chama o método para deletar

        // Exibe a mensagem após a operação
        echo $mensagem;
    } else {
        echo "ID do produto não informado.";
    }
}
?>
