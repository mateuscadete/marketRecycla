<?php

header("Content-Type: application/json");

// Rota para listar os itens do carrinho
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $stmt = $pdo->query("SELECT * FROM produto");
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($items);
    exit;
}

// Rota para adicionar um item ao carrinho
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['nome'], $data['qtde'], $data['preco'])) {
        http_response_code(400);
        echo json_encode(["message" => "Dados inválidos"]);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO produtos (nome, qtde, preco) VALUES (:nome, :qtde, :preco)");
    $stmt->execute([
        'nome' => $data['nome'],
        'qtde' => $data['qtde'],
        'preco' => $data['preco']
    ]);

    http_response_code(201);
    echo json_encode(["message" => "Item adicionado com sucesso"]);
    exit;
}

// Rota para atualizar a quantidade de um item
if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['id'], $data['qtde'])) {
        http_response_code(400);
        echo json_encode(["message" => "Dados inválidos"]);
        exit;
    }

    $stmt = $pdo->prepare("UPDATE produto SET qtde = :qtde WHERE id = :id");
    $stmt->execute([
        'qtde' => $data['qtde'],
        'id' => $data['id']
    ]);

    echo json_encode(["message" => "Quantidade atualizada com sucesso"]);
    exit;
}

// Rota para remover um item do carrinho
if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (!isset($data['id'])) {
        http_response_code(400);
        echo json_encode(["message" => "Dados inválidos"]);
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM produto WHERE id = :id");
    $stmt->execute(['id' => $data['id']]);

    echo json_encode(["message" => "Item removido com sucesso"]);
    exit;
}

// Caso nenhuma rota seja encontrada
http_response_code(404);
echo json_encode(["message" => "Rota não encontrada"]);
