<!--PHP-->
<?php
    //Paso 1: Cambiamos el nombre por el mio
    $username= 'Carmen';
    //Paso 2: Actualizar el saludo por Hi
    $greeting = 'Hi,' .$username .'.';
$offer = [
    'items' => 'Chocolate',
    //Paso 3: Actualizar el numero de paquetes a 3 y el precio de los caramelos a 6
    'qty' => 3,
    'price' => 6,
    'discount' => 4,
];
$usual_price= $offer['qty'] * $offer['price'];
$offer_price = $offer['qty'] * $offer['discount'];
$saving = $usual_price - $offer_price;

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 12</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Multi-buy Offer</h2>
    <p><?= $greeting?></p>

    <p class="sticker" > Save $<?= $saving ?></p>

    <p>Buy <?= $offer['qty'] ?> packs of <?= $offer['items']; ?>
    for $<?= $offer_price ?><br> (usual price $<?= $usual_price?>)</p>
</body>
</html>