<?php
//VARIABLES
//Paso 1: Cambiar el valor del stock a 0
    //$stock = 5;
    $stock = 0;
    $ordered = 3;
//CONDICIONAL
    if($stock > 0){
        $message='In stock';
    }
    elseif($ordered > 0){
        $message='Coming soon';
    }
    else{
        $message='Sould out';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4:Sentencia if...elseif</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Chocolate</h2>
<p><?=$message;?></p>
</body>
</html>