<?php
// Cambiar el valor de price por una cadena
//$price =4;
// Me hace lo mismo que un numero
$price ='4';
$quantity=3;
// Indicamos que puede ser enteros o float
function calculate_total(int $price,int $quantity):int|float{
    return $price * $quantity;
};

$total=calculate_total($price,$quantity);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.7: Type DEclarations</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">

</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Total $<?=$total; ?></p>
</body>
</html>