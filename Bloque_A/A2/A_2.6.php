<?php
//VARIABLES
//Paso 1: Cambiar el valor a tuesday
    $day = 'Monday';
    $day = 'Tuesday';
// Paso 1: cambiar el valor a wednesday, eliminar la de por defecto
    //$day = 'Wednesday';
//CONDICIONAL
$offer = match($day){
    //Paso 3: Añadir una expresion para tuesday
    'Monday' => '20% off chocolates',
    'Tuesday' => '15% off toffe',
    'Saturday', 'Sunday' => '20% mints',
    default => '10% off your entire order',

};
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 6:Match</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Offers on <?=$day;?></h2>
<p><?=$offer;?></p>
</body>
</html>