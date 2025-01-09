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
    $sms='<ul>
    <li><b>'.$productos[$id]['nombre'].'</b></li>
        <ul>
            <li>'.$productos[$id]['descripcion'].'</li>
            <li>'.$productos[$id]['precio'].'</li>
            <li>'.$productos[$id]['disponibilidad'].'</li>
        </ul>
</ul>';
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>

<p><?=$sms?></p>
<a href="b6.4_index.php">Volver a la lista de productos</a>

</body>
</html>