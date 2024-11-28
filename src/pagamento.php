<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link rel="stylesheet" href="Style/cadastro.css">
    <title>Pagamento</title>
    <style>
        
    

        

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
            margin: 0;
        }
        #form-checkout {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .container {
            margin-bottom: 15px;
        }
        input[type="text"], input[type="date"], input[type="email"], select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .progress-bar {
            width: 100%;
            margin-top: 10px;
        }
    
    </style>

</head>

<?php
include 'navbar.php';
?>

<body>




    <form id="form-checkout">
        
    <form id="form-checkout">
        <div id="form-checkout__cardNumber" class="container">
            <input type="text" id="cardNumber" placeholder="numero do cartão">
        </div>
        <div id="form-checkout__expirationDate" class="container">
            <input type="date" id="expiratioDate" placeholder="data de expiração">
        </div>
        <div id="form-checkout__securityCode" class="container">
            <input type="text" id="securityCode" placeholder="código de segurança">
        </div>
        <div class="container">
            <select id="form-checkout__issuer"></select>
        </div>
        <div class="container">
            <select id="form-checkout__installments"></select>
        </div>
        <div class="container">
            <select id="form-checkout__identificationType"></select>
        </div>
        <div class="container">
            <input type="text" id="form-checkout__identificationNumber" placeholder="número de identificação">
        </div>
        <div class="container">
            <input type="email" id="form-checkout__cardholderEmail" placeholder="email do titular do cartão">
        </div>

        <button type="submit" id="form-checkout__submit">Pagar</button>
        <progress value="0" class="progress-bar">Carregando...</progress>
    </form>
    <script src="javascript/pagamento.js"></script>
</body>

</html>