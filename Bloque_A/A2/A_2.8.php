<?php
//VARIABLES
//Paso 1: Cambiar el valor a 2.99
//$packs =5;
$packs =10;
$price =2.99;
//$price = 1.99;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 8:do-while</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Prices for Multiple Packs</h2>
<p>
    <?php
    //Paso 4: cambiar el operador a <
    do{
        echo $packs;
        echo 'packs cost $';
        echo $price * $packs;
        echo '<br>';
        $packs --;

    }while($packs > 0);
        
    ?>
</p>
</body>
</html>