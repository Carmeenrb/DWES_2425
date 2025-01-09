<?php
//  Crear el archivo de detalles del producto product.php : Este archivo recibirá el
//nombre del producto desde la cadena de consulta y mostrará su descripción.
// Modifica los arrays $products en ambos archivos para agregar más productos
// y descripciones.
// Experimenta agregando más detalles al producto, como el precio o la
// disponibilidad, y muestralo en product.php .

$id = $_GET['id'] ?? 0;

// Array de productos
$productos = [
    ['nombre' => "Pantalla", 'descripcion' => 'Pantalla de 24 pulgadas','precio' => 150,'disponibilidad' => 'En stock'],
    ['nombre' => 'Teclado','descripcion' => 'Teclado mecanico','precio' => 50,'disponibilidad' => 'Agotado'],
    ['nombre' => 'Raton','descripcion' => 'Teclado mecanico','precio' => 50,'disponibilidad' => 'Agotado'],
];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
<ul>
    <li><b><?= $productos[$id]['nombre']?>:</b></li>
    <ul>
                <li><?= $productos[$id]['descripcion']?></li>
                <li><?= $productos[$id]['precio']?></li>
                <li><?= $productos[$id]['disponibilidad']?></li>
            </ul>
    </ul>

<a href="b6.1_index.php">Volver a la lista de productos</a>

</body>
</html>