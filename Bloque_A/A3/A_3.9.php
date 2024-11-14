<?php

$stock=25;
// Indicamos que puede ser enteros o float
function get_stock_message($stock){
    if($stock >10){
        return 'Good availabilily';
    }
    if($stock >0 && $stock <10){
        return 'Low stock';
    }
    // crear un nuevo if para que retorne un mensaje diferente si es 10
    if($stock == 10){
        return 'Exactly 10 items in stock';
    }
    return 'Out of stock';

};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.9: Multiple Return Statements</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">

</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p><?= get_stock_message($stock); ?></p>
    
<!-- Creamos la tabla con todos los mensajes -->
    <table>
        <tr>
            <th>stock >= 10</th>
            <th>stock > 0 && stock < 10 </td>
            <th>stock == 10</th>
            <th>Ninguna de las anteriores</th>
        </tr>
        <tr>
            <td><?= get_stock_message(11);?></td>
            <td><?= get_stock_message(5);?></td>
            <td><?= get_stock_message(10);?></td>
            <td><?= get_stock_message(-1);?></td>
        </tr>
    </table>
</body>
</html>