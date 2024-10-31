<!--PHP-->
<?php
    $items = 'Chocolate';
    $stock = 10;
    $wanted = 8;
    $deliver= true;
    $can_buy = (($wanted <= $stock) && ($deliver == true));

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 11</title>
    <link rel="stylesheet" href="css/styles.css">
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