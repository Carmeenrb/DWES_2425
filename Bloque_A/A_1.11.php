<!--PHP-->
<?php
    $items = 'Chocolate';
    $stock = 5;
    $wanted = 3;
    $can_buy = ($wanted <= $stock);

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 8: String Operator</title>
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