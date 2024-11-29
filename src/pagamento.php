<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link rel="stylesheet" href="Style/cadastro.css">
    <title>Pagamento</title>
    <style>
        
    

        

    #form-checkout{
            
    background-color: #403D36;
    border: 1px solid gray;
    border-radius: 8px;
    padding: 30px 30px;
    width: 350px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-top: 800px;
        }

     

    .container{
    width: 100%;
    padding: 6px;
    margin: 10px 0;
    border: 1px solid #dadce0;
    border-radius: 4px;
    background-color: #f1f3f4;
    font-size: 5px;
    box-sizing: border-box;
    color:black;
    }

    select{
    width: 100%;
    padding: 6px;
    margin: 10px 0;
    border: 1px solid #dadce0;
    border-radius: 4px;
    background-color: #f1f3f4;
    font-size: 16px;
    box-sizing: border-box;

    }
    </style>
</head>

<body>
    <form id="form-checkout">
        
        <div id="form-checkout__cardNumber" class="container">
            <input type="text" id="cardNumber" placeholder="numero do cartão">
        </div>
        <br>
        <div id="form-checkout__expirationDate" class="container">
            <input type="text" id="expiratioDate" placeholder="data de expiração">
        </div>
        <br>
        <div id="form-checkout__securityCode" class="container">
            <input type="text" id="securityCode" placeholder="código de segurança">
        </div>
        <br>
        
        <select id="form-checkout__issuer"></select>
        <select id="form-checkout__installments"></select>
        <select id="form-checkout__identificationType"></select>
        <input type="text" id="form-checkout__identificationNumber" />
        <input type="email" id="form-checkout__cardholderEmail" />

        <button type="submit" id="form-checkout__submit">Pagar</button>
        <progress value="0" class="progress-bar">Carregando...</progress>
    </form>

    <script src="javascript/pagamento.js"></script>
</body>
</html>