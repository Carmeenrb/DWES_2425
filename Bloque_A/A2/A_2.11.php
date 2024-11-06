<?php
//Array
//Paso 1: Añadir dos elementos mas al array
$products=[
    'Toffe' => 2.99,
    'Mints' => 1.99,
    'Fudge' => 3.49,
    'Popcon' => 2.59,
    'Lemon' => 4.79,
];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 10:Bucle foreach</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Prices List</h2>
<table>
    <tr>
        <th>Item</th>
        <th>Price</th>
    </tr>
    <?php foreach($products as $item => $price ){?>
        <tr>
            <td><?= $item?></td>
            <td>$<?= $price?></td>
        </tr>
    <?php }?>
</table>
</body>
</html>