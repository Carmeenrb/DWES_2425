<!-- pag 49  -->
<?php
$sms='correcto';
// Array de productos
$productos = [
    ['nombre' => "Pantalla", 'descripcion' => 'Pantalla de 24 pulgadas','precio' => 150,'disponibilidad' => 'En stock'],
    ['nombre' => 'Teclado','descripcion' => 'Teclado mecanico','precio' => 50,'disponibilidad' => 'Agotado'],
    ['nombre' => 'Raton','descripcion' => 'Teclado mecanico','precio' => 50,'disponibilidad' => 'Agotado'],
];

$id = $_GET['id'] ?? "";
$valido = array_key_exists($id,$productos);

// Validaciones

if(!$valido){
    http_response_code(404);
    header('Location: b6.4_pag_error.php');
    exit;

    // $sms = $productos;
}else{
    $sms='
    <h1><b>'.$productos[$id]['nombre'].'</b></h1>
        <p>'.$productos[$id]['descripcion'].'</p>
        <p>'.$productos[$id]['precio'].'</p>
        <p>'.$productos[$id]['disponibilidad'].'</p>';
}
?>

<?php include 'includes/header.php' ?>
<h1>Productos</h1>
<p><?=$sms?></p>
<a href="b6.4_index.php">Volver a la lista de productos</a>

<?php include 'includes/footer.php' ?>