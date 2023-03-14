<?php
// SDK de Mercado Pago
require 'mercadoPago/vendor/autoload.php';
// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-1976108682953635-010316-790b0791e17b8c33a1eb89264bd6c1fa-565208044');

$preference = new MercadoPago\Preferences;

$item = new MercadoPago\item();
$item->id = '1';
$item->title = 'producto CDP';
$item->quantity = 1;
$item->unit_price = 99.000;
$item->currency = 'COP';

$preference->$items = array($item);

$preference->save();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    // SDK MercadoPago.js
<script src="https://sdk.mercadopago.com/js/v2"></script>
</head>
<body>
    <h3>Mercado pago</h3>

    <div class="checkout-btn">

    </div>

    <script>
        const mp = new MercadoPago('TEST-26c44e02-ea5a-4045-9741-caef537653aa', {
            locale: 'es-COP'
        });

        mp.checkout({
            preferece:{
                id: '<?php echo $preference->id ?>'
            },
            render:{
                container: '.checkout-btn',
                label: 'pagar con MP'
            }
        })
    </script>
</body>
</html>