<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link rel="stylesheet" href="Style/cadastro.css">
    <title>Pagamento</title>
    <style>
        #form-checkout {
            background-color: #403D36;
            border: 1px solid gray;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 30px;
            margin-left: auto;
            margin-right: auto;
        }

        .container {
            width: 100%;
            padding: 4px;
            margin: 8px 0;
            border: 1px solid #dadce0;
            border-radius: 4px;
            background-color: #f1f3f4;
            font-size: 14px;
            box-sizing: border-box;
            color: black;
            height: 35px;
        }

        select, input {
            width: 100%;
            padding: 4px;
            margin: 8px 0;
            border: 1px solid #dadce0;
            border-radius: 4px;
            background-color: #f1f3f4;
            font-size: 14px;
            box-sizing: border-box;
            height: 35px;
        }

        #form-checkout__submit {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 15px;
        }

        #form-checkout__submit:hover {
            background-color: #45a049;
        }

        .form-row {
            display: flex;
            gap: 8px;
            margin-bottom: 8px;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form id="form-checkout">
        <div class="container" id="form-checkout__cardNumber"></div>
        <div class="form-row">
            <div class="container" id="form-checkout__cardExpirationMonth"></div>
            <div class="container" id="form-checkout__cardExpirationYear"></div>
        </div>
        <div class="container" id="form-checkout__securityCode"></div>
        <input type="text" id="form-checkout__cardholderName" placeholder="Titular do cartão"/>
        <select id="form-checkout__issuer"></select>
        <select id="form-checkout__installments"></select>
        <select id="form-checkout__identificationType"></select>
        <input type="text" id="form-checkout__identificationNumber" placeholder="Número do documento"/>
        <input type="email" id="form-checkout__cardholderEmail" placeholder="E-mail"/>
        <button type="submit" id="form-checkout__submit">Pagar</button>
        <progress value="0" class="progress-bar">Carregando...</progress>
    </form>

    <script src="javascript/pagamento.js"></script>
</body>
</html>