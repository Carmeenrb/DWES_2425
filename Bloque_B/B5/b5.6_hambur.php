<?php
// PAGINA 78
// Definir las hamburguesas y sus precios
$hamburguesas = [
    "Hamburguesa Clásica" => 5.50,
    "Hamburguesa con Queso" => 6.75,
    "Hamburguesa BBQ" => 7.25,
    "Hamburguesa Vegetariana" => 6.00
];
// Generar ventas aleatorias: Utilizar mt_rand
$totalVentas = mt_rand(50, 100);

// Asignar hamburguesas y cantidades

$ventas = [];

// Simular ventas
for ($i = 0; $i < $totalVentas; $i++) {
    // Elegir una hamburguesa aleatoriamente
    $hamburguesa = array_rand($hamburguesas);

    // Cantidad entre 1 y 5
    $cantidad = rand(1, 5);

    // Calcular el total de la venta y el redondeo a 2
    $precioUnitario = $hamburguesas[$hamburguesa];
    $totalVenta = round($cantidad * $precioUnitario, 2);

    // Guardar la venta
    $ventas[] = [
        "hamburguesa" => $hamburguesa,
        "cantidad" => $cantidad,
        "total" => $totalVenta
    ];
}

// Calcular el total del dia: number_format
$ventasTotalesDia = 0;
foreach ($ventas as $venta) {
    $ventasTotalesDia += $venta["total"];
}
$ventasDia= number_format($ventasTotalesDia,2,".","");

// Calcular la raiz cuadrada del total de ventas y elevar el total a la potencia utilizando sqrt y pow. Para redondear: ceil floor
// Calcular la raíz cuadrada de las ventas totales del día
$raizCuadrada = sqrt($ventasTotalesDia);

// Elevar el total de las ventas a la potencia de 2
$potenciaDos = pow($ventasTotalesDia, 2);

// Redondear hacia arriba y hacia abajo las ventas totales del día
$ventasTotalesCeil = ceil($ventasTotalesDia);
$ventasTotalesFloor = floor($ventasTotalesDia);
?>
<?php include 'includes/header.php'; ?>
<h1>Tipo de Hamburguesas</h1>
<h2>Hamburguesa Clásica: $5.50</h2>
<h2>Hamburguesa con Queso: $6.75</h2>
<h2>Hamburguesa BBQ: $7.25</h2>
<h2>Hamburguesa Vegetariana: $6.00</h2>
<br>
<h3>Ventas aleatorias: </h3>
<p><?= $totalVentas ?></p>
<h3>Asignar Hamburguesas y Cantidades</h3>
<p></p>
<h3>Calcular el total de cada venta</h3>
<?php foreach($ventas as $venta){?>
<p>Tipo: <?=$venta['hamburguesa']?></p>
<p>Cantidad: <?=$venta['cantidad']?></p>
<p>Total: <?=$venta['total']?></p>
<br>
<?php }?>
<h3>Ventas Totales del dia</h3>
<?=$ventasDia?>
<h3>Calcular la raiz cuadrada </h3>
<?=$raizCuadrada?>
<h3>Elevar el total de ventas del dia a la potencia de 2</h3>
<?=$potenciaDos?>
<h3>Redondear hacia arriba: Ceil</h3>
<?=$ventasTotalesCeil?>
<h3>Redondear hacia abajo_ Floor</h3>
<?=$ventasTotalesFloor?>


<?php include 'includes/footer.php'; ?>