<?php
// Crear un array de productos
$productos=[
    ['nombre'=> 'Dark Chocolate', 'cost'=>5,'quantity'=>10,'discount'=>5,'tax'=>0 ,'shipping'=>'NO'],
    ['nombre'=> 'Milk Chocolate', 'cost'=>3,'quantity'=>4,'discount'=>0,'tax'=>0 ,'shipping'=>'YES'],
    ['nombre'=> 'Write Chocolate', 'cost'=>4,'quantity'=>15,'discount'=>20,'tax'=>0 ,'shipping'=>'SOON'],
    ['nombre'=> 'Mint Candy', 'cost'=>2,'quantity'=>15,'discount'=>5,'tax'=>2 ,'shipping'=>'NO'],
    ['nombre'=> 'Lemon Candy', 'cost'=>4,'quantity'=>4,'discount'=>0,'tax'=>0 ,'shipping'=>'YES'],
    ['nombre'=> 'Coffee Candy', 'cost'=>3,'quantity'=>10,'discount'=>25,'tax'=>3 ,'shipping'=>'SOON'],
];
// Añadimos un parametro nuevo: shipping
function calculate_cost($cost,$quantity,$discount=0,$tax=20,$shipping=0){
    $cost = $cost * $quantity;
    $tax=$cost*($tax/100);
    return ($cost + $tax) - $discount;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.11: Default Values for Paraments</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>Dark chocolate $ <?= calculate_cost(quantity:10,cost:5,tax:5,discount:2);?></p>
    <p>Milk chocolate $ <?= calculate_cost(quantity:10,cost:5,tax:5,);?></p>
    <p>Write chocolate $ <?= calculate_cost(5,10,tax:5);?></p>

    <!-- Crear mas productos -->
    <h2>Candy</h2>
    <p>Mint candy $ <?= calculate_cost(quantity:5,cost:3,tax:4,discount:2);?></p>
    <p>Lemon candy $ <?= calculate_cost(5,3);?></p>
    <p>Coffee candy $ <?= calculate_cost(quantity:15,cost:6,tax:5,);?></p>
<br>
<!-- Crear una tabla para mostrar los costos calculados de los productos -->
<table>
    <tr>
        <th>Productos</th>
        <th>Cost</th>
        <th>Quantity</th>
        <th>Discount</th>
        <th>Tax</th>
        <th>Shipping</th>
    </tr>
    <?php foreach($productos as $producto){?>
    <tr>
        <td><?=$producto['nombre']?></td>
        <td><?=$producto['cost']?></td>
        <td><?=$producto['quantity']?></td>
        <td><?=$producto['discount']?></td>
        <td><?=$producto['tax']?></td>
        <td><?=$producto['shipping']?></td>
    
    </tr>
    <?php }?>
</table>
</body>
</html>