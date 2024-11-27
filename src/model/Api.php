<?php
    // Step 1: Require the library from your Composer vendor folder
  

    use MercadoPago\Client\Common\RequestOptions;
    use MercadoPago\Client\Payment\PaymentClient;
    use MercadoPago\Exceptions\MPApiException;
    use MercadoPago\MercadoPagoConfig;

    // Step 2: Set production or sandbox access token
    MercadoPagoConfig::setAccessToken("TEST-2590580902162902-112618-a4411f821eb2d9bd6e72cd2553916e17-2120752698");
    // Step 2.1 (optional - default is SERVER): Set your runtime enviroment from MercadoPagoConfig::RUNTIME_ENVIROMENTS
    // In case you want to test in your local machine first, set runtime enviroment to LOCAL
    MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);

    // Step 3: Initialize the API client
    $client = new PaymentClient();
 
    try {

        // Step 4: Create the request array
        $request = [
           // "transaction_amount" => 100,
           // "token" => "YOUR_CARD_TOKEN",
            //"description" => "description",
            //"installments" => 1,
            //"payment_method_id" => "visa",
            //"payer" => [
             //   "email" => "user@test.com",
            //]
        ];

        // Step 5: Create the request options, setting X-Idempotency-Key
        $request_options = new RequestOptions();
        $request_options->setCustomHeaders(["X-Idempotency-Key: <SOME_UNIQUE_VALUE>"]);

        // Step 6: Make the request
        $payment = $client->create($request, $request_options);
        echo $payment->id;

    // Step 7: Handle exceptions
    } catch (MPApiException $e) {
        echo "Status code: " . $e->getApiResponse()->getStatusCode() . "\n";
        echo "Content: ";
        var_dump($e->getApiResponse()->getContent());
        echo "\n";
    } catch (\Exception $e) {
        echo $e->getMessage();
    }