<?php
header('Content-Type: application/json');

try {
    // Recebe os dados do POST
    $jsonData = file_get_contents('php://input');
    $data = json_decode($jsonData, true);

    if (!$data) {
        throw new Exception('Dados inválidos');
    }

    // Aqui você implementaria a lógica real de processamento do pagamento
    // Por enquanto, vamos simular uma resposta de sucesso
    $response = [
        'status' => 'approved',
        'message' => 'Pagamento processado com sucesso',
        'transaction_id' => uniqid('trans_'),
        'data' => $data
    ];

    // Log para debug
    error_log('Dados recebidos: ' . print_r($data, true));
    error_log('Resposta enviada: ' . print_r($response, true));

    // Retorna a resposta
    echo json_encode($response);

} catch (Exception $e) {
    // Em caso de erro, retorna uma resposta de erro
    http_response_code(400);
    echo json_encode([
        'status' => 'error',
        'message' => $e->getMessage()
    ]);
}