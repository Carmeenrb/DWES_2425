<?php
//VARIABLES
//Paso 1: Cambiar el valor a wednesday
    $day = 'Monday';
    $day = 'Wednesday';
    
//CONDICIONAL
    switch($day){
        case 'Monday':
            $offer = '20% off chocolates';
            break;
        case 'Tuesday':
            $offer = '20% off mints';
            break;
            //Paso 5: Añadir una sentencia para wednesday
            case 'Wednesday':
                $offer = '20% off toffe';
                break;
        default:
        $offer = 'Buy three packs, get one free';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 5:Switch</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Offers on <?=$day;?></h2>
<p><?=$offer;?></p>
</body>
</html>