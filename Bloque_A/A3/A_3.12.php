<?php
//Variables
$tax_rate=12; //12%
//Array de libros
$libros=[
    'libro1' =>['nombre'=> 'Alas de Sangre','precio' => 22,'stock'=>40],
    'libro2' =>['nombre'=> 'Alas de Hierro','precio' => 26,'stock'=>50],
    'libro3' =>['nombre'=> 'Alas de Onix','precio' => 33,'stock'=>100],
];
//Crear una funcion para ver cuanto stock tenemos y los impuestos...
function get_total_stock(array $libros):int{
    $total_stock=0;
        foreach($libros as $libros){
            $total_stock+=$libros['stock'];
        }
        
    
    return $total_stock;
}
//Funcion para que devuelva el valor total del inventario
function get_inventory_value(float $precio, int $cantidad):float{
    return $precio * $cantidad;
}

//Funcion que devuelve el importe del impuesto a pagar
function calculate_tax(float $precio,int $tax=0):float{
    return $precio*($tax/100);
}

// Coger el total de estock
$stock_total=get_total_stock($libros);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.11:Ejemplo Final</title>
    <link rel="stylesheet" href="RecursosA1/css/stile_libros.css">
    
</head>
<body>
    <h1>Los Libros de Carmela</h1>
    <h2>Stock de Libros</h2>
    <table>
        <tr>
            <th>Libros</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Valor en Inventario</th>
            <th>Impuesto a pagar</th>
        </tr>
        <?php foreach($libros as $libro){ ?>
        <tr>
            <td><?=$libro['nombre']?></td>
            <td><?=$libro['precio']?></td>
            <td><?=$libro['stock']?></td>
            <td><?= get_inventory_value($libro['precio'],$libro['stock'],)?></td>
            <td><?= calculate_tax($libro['precio'],$tax_rate)?></td>
            
        </tr>
        <?php }?>
        <tr>
            <td colspan="2">Total</td>
            <td><?=$stock_total?></td>
            <td colspan="2"></td>

        </tr>
    
    </table>

</body>
</html>