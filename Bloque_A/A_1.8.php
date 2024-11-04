<!--PHP-->
<?php

    //Paso 2: cambiamos la cantidad (lo he cambiado a 10)
    $items = 10;
    //Paso 1: cambiar el coste del articulo (lo he cambiado a 7)
    $cost = 7;
    $subtotal = $cost * $items;
    $tax = ($subtotal / 100)*20;
    $total = $subtotal + $tax;


?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 8:</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Shopping Cart</h2>
    <p>Items: <?= $items ?></p>
    <p>Cost per pack: <?= $cost ?></p>
    <p>Subtotal: <?= $subtotal ?></p>
    <p>Tax: <?= $tax ?></p>
    <p>Total: <?= $total ?></p>

</body>
</html>