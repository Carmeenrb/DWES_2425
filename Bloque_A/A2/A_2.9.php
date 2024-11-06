<?php
//VARIABLES
//Paso 1: Cambiar el valor a 2.99
//$price = 1.99;
$price = 2.99;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 9:Bucle for</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Prices for Multiple Packs</h2>
<p>
    <?php
    //Paso 2: el bucle se debe de repetir 20 veces
    for($i = 1;$i <= 20;$i++){
        echo $i;
        echo 'packs cost $';
        echo $price * $i;
        echo '<br>';
    }
        
    ?>
</p>
</body>
</html>