<?php
//VARIABLES
$counter = 1;
//Paso 2: Aumentar el numero de paquetes
//$packs =5;
$packs =10;
$price = 1.99;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7:While</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Prices for Multiple Packs</h2>
<p>
    <?php
    //Paso 4: cambiar el operador a <
    while($counter <= $packs){
        echo $counter;
        echo 'packs cost $';
        echo $price * $counter;
        echo "<br>";
        $counter ++;
    }
    ?>
</p>
</body>
</html>