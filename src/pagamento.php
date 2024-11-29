<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagens/MR_processed.png" type="image/icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link rel="stylesheet" href="Style/cadastro.css">
    <title>Pagamento</title>
    <style> 

    
#form-checkout {
    max-width: 400px;
    margin-top:30%;
    
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    font-family: Arial, sans-serif;
}

#form-checkout h2{color: white;
    font-size: 24px;
    margin-bottom: 20px;
    font-weight: bold;}


#form-checkout input,
#form-checkout select {
    width: 90%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}


#form-checkout input:focus,
#form-checkout select:focus {
    border-color: #007bff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

#form-checkout__submit {
    width: 100%;
    padding: 10px;
    margin-top: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

#form-checkout__submit:hover {
    background-color: #0056b3;
}

#form-checkout__expirationDate{
    width:60%;
}


.progress-bar {
    width: 100%;
    height: 8px;
    margin-top: 15px;
    border-radius: 4px;
    background-color: #e9ecef;
    overflow: hidden;
    appearance: none;
}

.progress-bar::-webkit-progress-value {
    background-color: #007bff;
    border-radius: 4px;
}

.progress-bar::-moz-progress-bar {
    background-color: #007bff;
}


#form-checkout input::placeholder {
    color: #aaa;
}


@media (max-width: 480px) {
    #form-checkout {
        padding: 15px;
    }
    #form-checkout input,
    #form-checkout select,
    #form-checkout__submit {
        font-size: 14px;
    }
}
    </style>

</head>

<?php
include 'Include/navbar.php';
?>

<body>


<form id="form-checkout">

        <h2>Formulário Pagamento</h2>

        <input type="text" id="form-checkout__cardNumber" placeholder="Número do Cartão"/>
        <label for="card">Data de Expiração:</label>
        <input type="date" id="form-checkout__expirationDate" placeholder= "Data de Expiração"/>
        <input type="text" id="form-checkout__securityCode" placeholder="Código de Segurança"/>
        <input type="text" id="form-checkout__cardholderName" />
        <select id="form-checkout__issuer">
            <option value="bank">Itaú</option>
            <option value="bank">Santander</option>
            <option value="bank">Banco do Brasil</option>
            <option value="bank">Bradesco</option>
            <option value="bank">Caixa</option>
        </select>
        <select id="form-checkout__installments">
            <option value="1">1x sem Juros</option>
            <option value="2">2x sem Juros</option>
            <option value="3">3x sem Juros</option>
            <option value="4">4x sem Juros</option>
            <option value="5">5x sem Juros</option>
            <option value="6">6x sem Juros</option>
        </select>
        <select id="form-checkout__identificationType"></select>
        <input type="text" id="form-checkout__identificationNumber" />
        <input type="email" id="form-checkout__cardholderEmail" />

        <button type="submit" id="form-checkout__submit">Pagar</button>
        <progress value="0" class="progress-bar">Carregando...</progress>
    </form>

    
        
    
    <script src="javascript/pagamento.js"></script>
</body>

</html>