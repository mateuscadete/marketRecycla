<?php

namespace App\model;
require_once '.././vendor/autoload.php';

class MercadoPago {
    public function __construct() {
        MercadoPago\SDK::setAccessToken('TEST-2590580902162902-112618-a4411f821eb2d9bd6e72cd2553916e17-2120752698');
    }
}