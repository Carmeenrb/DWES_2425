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
<?php include '../includes/header.php' ?>

    <h1><b>Productos</b></h1>
    <h2><?= $productos[$id]['nombre']?></h2>
                <p><?= $productos[$id]['descripcion']?></p>
                <p><?= $productos[$id]['precio']?></p>
                <p><?= $productos[$id]['disponibilidad']?></p>
<a href="b6.1_index.php">Volver a la lista de productos</a>

<?php include '../includes/footer.php' ?>