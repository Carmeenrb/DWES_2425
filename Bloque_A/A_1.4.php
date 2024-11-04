<!--PHP--> 
<?php
// Array Indexados
//Paso 1: Añadir un nuevo elemento despues de fudge (Popcorn)
    $best_sellers = ['Chocolate','Mints','Fudge','Popcorn',
    'Bubble gum','Toffee','Jelly beans',];
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indexed Arrays</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>

<body>
<h1>The Candy Store</h1>
<h2>Best Sellers</h2>
<ul>
    <li><?php echo $best_sellers[0]; ?></li>
    <li><?php echo $best_sellers[1]; ?></li>
    <li><?php echo $best_sellers[2]; ?></li>
    <!--Paso 2: Mostrar la posicion 4 y 5 del array-->
    <li><?php echo $best_sellers[4]; ?></li>
    <li><?php echo $best_sellers[5]; ?></li>
    
</ul>

</body>

</html>