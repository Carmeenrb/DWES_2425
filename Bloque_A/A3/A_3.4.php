<!-- PHP -->
<?php
//Paso 1: cambiar el tax a 25
//$tax='20';
$tax='25';
function calculate_total($price,$quantity){
    $cost=$price * $quantity;
    //Cambiamos el porcentaje para que sea 40 por ejemplo en vez de 20
    $tax= $cost * (40/100);
    $total =$cost + $tax;
    return $total;
}
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.4= Global and Local Scope</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <p>Mints: $ <?= calculate_total(2,5)?></p>
    <p>Toffee: $ <?= calculate_total(3,5)?></p>
    <p>Fudge: $ <?= calculate_total(5,5)?></p>
    <p>Prices include tax at: <?= $tax?>%</p>
</body>
</html>