<?php
declare (strict_types =1);
// Paso 2: Cambiamos el valor por una cadena
// $price =4;
// Esto ya da error ya que es una cadena y lo hemos puesto para que sea tipado
//$price ='4';
// Cambiamos el precio a 4.5
$price=4.5;
$quantity=3;
// Indicamos que puede ser enteros o float
function calculate_total(float $price,int $quantity):int|float{
    return $price * $quantity;
};

$total=calculate_total($price,$quantity);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.8: Return Type Declarations</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">

</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Total $<?=$total; ?></p>
</body>
</html>