<?php
$us_price=4;
$rates=[
    'uk' => 0.81,
    'eu' => 0.93,
    'jp' => 113.21,
    'aud' => 1.30,
    'cad' => 1.25,
];
// Creamos un array de productos
$productos=[
    ['nombre'=>'caramelo','precio'=>2],
    ['nombre'=>'palomitas','precio'=>4.5],
    ['nombre'=>'chicles','precio'=>3],

];
// Paso1: Añadir mas monedas
function calculate_prices($usd,$exchange_rates){
    $prices=[
        'pound' => $usd * $exchange_rates['uk'],
        'euro' => $usd * $exchange_rates['eu'],
        'yen' => $usd * $exchange_rates['jp'],
        // Añadimos ls nuevas monedas
        'dolar_a' => $usd * $exchange_rates['aud'],
        'dolar_c' => $usd * $exchange_rates['cad'],
    ];
    return $prices;
};

// Crear una funcion para formatear los precios
//Crear una tabla de precios con varios productos con la diferentes monedas

$global_prices= calculate_prices($us_price,$rates);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.6: Functions with Multiple Values</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">

</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolates</h2>
    <p>US $ <?=$us_price;?></p>
    <p>(UK &pound; <?=$global_prices['pound'];?> |
        EU &euro; <?=$global_prices['euro'];?> |
        JP &yen; <?=$global_prices['yen'];?> |
        <!-- Añadimos las dos nuevas para mostrarlo -->
        AUD $ <?=$global_prices['dolar_a'];?> |
        CAD $ <?=$global_prices['dolar_c'];?> )</p>

        <!-- Crear una tabla de productos con diferentes monedas -->
        <table>
            <tr>
                <th>Productos</th>
                <th>Precio</th>
                <th>Precio en Libras</th>
                <th>Precio en Euros</th>
                <th>Precio en Yen</th>
                <th>Precio en AUD</th>
                <th>Precio en DAD</th>
                
            </tr>
            
            <?php foreach ($productos as $producto){ ?>
                <!-- en converted_prices:Te almacena los precios cambiados en cada moneda -->
            <?php $converted_prices = calculate_prices($producto['precio'], $rates); ?>
            <tr>
                <td><?= $producto['nombre']; ?></td>
                <td><?= $producto['precio']; ?> USD</td>
                <td>&pound; <?= $converted_prices['pound']; ?></td>
                <td>&euro; <?= $converted_prices['euro']; ?></td>
                <td>&yen; <?= $converted_prices['yen']; ?></td>
                <td>AUD $ <?= $converted_prices['dolar_a']; ?></td>
                <td>CAD $ <?= $converted_prices['dolar_c']; ?></td>
            </tr>
        <?php } ?>
            
        </table>
</body>
</html>