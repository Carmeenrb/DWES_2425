<!--PHP-->
<?php
    $items = 'Chocolate';
    //Paso 1: cambiar los valores de stock y wanted (por lo que el valor de can_buy cambiara)
    $stock = 10;
    $wanted = 8;
    $can_buy = ($wanted <= $stock);

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 10</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Shopping Cart</h2>
    <p>Items: <?= $items?></p>
    <p>Stock: <?= $stock ?></p>
    <p>Wanted: <?= $wanted?></p>
    <!--Te imprime true o false en vez de 1 o nada-->
    <p>Can Buy: <?=json_encode($can_buy)?></p>
</body>
</html>