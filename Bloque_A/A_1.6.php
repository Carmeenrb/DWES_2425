<!--PHP--> 
<?php
// Array Miltidimensionales
    $offers = [
        ['name' => 'Toffe', 'price'=> 5, 'stock' => 120,],
        ['name' => 'Mints', 'price'=> 3, 'stock' => 66,],
        ['name' => 'Fudge', 'price'=> 4, 'stock' => 97,],
        // Nuevo elemento
        ['name' => 'Chocolate', 'price'=> 2, 'stock' => 83,],
    ];
    
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multidimensional Arrays</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
<h1>The Candy Store</h1>
<h2>Offers</h2>
    <p><?php echo $offers[0]; ?> - 
    $<?php echo $offers[0]; ?></p>
    <p><?php echo $offers[1];?> - 
    $<?php echo $offers[1]?></p>
    <p><?php echo $offers[2];?> - 
    $<?php echo $offers[2]?></p>
    <!--Salida del nuevo elemento -->
    <p><?php echo $offers[3];?> - 
    $<?php echo $offers[3]?></p>




</body>

</html>