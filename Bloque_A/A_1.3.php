<!--PHP--> 
<?php
// Array Asociativos
//Paso 1: Cambiar los valores del array 
    $nutrition = [
    'fat' => 42,
    'sugar' => 60,
    'salt' => 3.5,
    //Paso 2: añadir un nuevo elemento al array
    'protein' => 2.6,
    ];
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>

<body>
<h1>The Candy Store</h1>
<h2>Nutrition (per 100g)</h2>
<p>Fat: <?php echo $nutrition['fat']; ?>%</p>
<p>Sugar: <?php echo $nutrition['sugar']; ?>%</p>
<p>Salt: <?php echo $nutrition['salt']; ?>%</p>
<!--Paso 2: mostrar el nuevo elemento -->
<p>Protein: <?php echo $nutrition['protein']; ?>%</p>

</body>

</html>