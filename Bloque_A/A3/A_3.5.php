<?php
// Paso 2:Modificar la tasa de impuestos
//$tax_rate = 0.2;
$tax_rate = 0.5;
//Creamos una nueva variable
$discount=0.1;
function calculate_running_total($price,$quantity){
    global $tax_rate;
    static $running_total=0;
    global $discount;
    $total=0;
    $total=$price * $quantity;
    // Le aplicamos el discount
    $desc=$total * $discount;
    $tax = $desc * $tax_rate;
    $running_total = $running_total + $total + $tax;
    return $running_total;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.5: Global and Static Variables</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <table>
        <tr>
            <th>Item</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Running Total</th>
        </tr>
        <tr>
            <td>Mints:</td>
            <td>$2</td>
            <td>5</td>
            <td><?= calculate_running_total(2,5);?></td>
        </tr>
        <tr>
            <td>Toffe:</td>
            <td>$3</td>
            <td>5</td>
            <td><?= calculate_running_total(2,5);?></td>
        </tr>
        <tr>
            <td>Fudge:</td>
            <td>$5</td>
            <td>4</td>
            <td><?= calculate_running_total(2,5);?></td>
        </tr>
        <tr>
            <!-- Paso 1:Añadir un producto mas a la tabla -->
            <td>Chicles:</td>
            <td>$2</td>
            <td>5</td>
            <td><?= calculate_running_total(2,5);?></td>
        </tr>
    </table>
</body>
</html>