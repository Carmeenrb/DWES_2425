<?php
//VARIABLES
//Paso 1: Añadir dos elementos mas al array
$best_sellers=['Toffe','Mints','Fudge','Popcon','Lemon'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 10:Bucle foreach(2)</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Best Sellers</h2>
<p>
    <!-- Cambiamos el nombre de la variable $product a $candy -->
    <?php foreach($best_sellers as $candy){?>
        <p><?= $candy?></p>
    <?php }?>
</p>
</body>
</html>