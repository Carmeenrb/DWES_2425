<?php
//VARIABLES
$price = 1.99;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 10:Bucle for(2)</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Prices for Multiple Packs</h2>
<p>
    <?php
    //Paso 2: el bucle se debe de repetir 200 veces
    for($i = 10;$i <= 200;$i=$i+10){
        echo $i;
        echo 'packs cost $';
        echo $price * $i;
        echo '<br>';
    }
        
    ?>
</p>
</body>
</html>