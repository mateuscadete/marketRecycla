require_once('../model/vendor/autoload.php');

// Definir sua chave secreta da API Stripe
\Stripe\Stripe::setApiKey('sk_test_sua_chave_secreta');

// Função para calcular o total do carrinho
function calcularTotalCarrinho() {
    $total = 0;
    foreach ($_SESSION['carrinho'] as $item) {
        $total += $item['quantidade'] * $item['preco'];
    }
    return $total;
}

// Suponha que você tenha o token do Stripe vindo do front-end (por exemplo, usando Stripe Elements)
$token = $_POST['stripeToken']; // Token gerado pelo Stripe

try {
    // Criando o pagamento no Stripe
    $charge = \Stripe\PaymentIntent::create([
        'amount' => calcularTotalCarrinho() * 100, // o valor deve ser em centavos
        'currency' => 'brl',
        'payment_method' => $token,
        'confirmation_method' => 'manual',
        'confirm' => true,
    ]);

    // Se o pagamento for bem-sucedido
    echo "Pagamento realizado com sucesso!";
} catch (\Stripe\Exception\ApiErrorException $e) {
    // Em caso de erro
    echo "Erro ao processar o pagamento: " . $e->getMessage();
}
