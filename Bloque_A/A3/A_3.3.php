<!-- PHP -->
<?php
function calculate_total($price,$quantity){
    $cost=$price * $quantity;
    $tax= $cost * (20/100);
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
    <title>Actividad 3.3= Functions with Parameters</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <p>Mints: $ <?= calculate_total(2,5)?></p>
    <p>Toffee: $ <?= calculate_total(3,5)?></p>
    <p>Fudge: $ <?= calculate_total(5,5)?></p>
    <!-- Paso 6: Chicles -->
    <p>Chicles:$ <?= calculate_total(1.50,4)?></p>
</body>
</html>