<?php
// Variables
$stock = 25;

// condicionales
if ($stock >=10){
    $message = 'Good availability';
}
if ($stock > 0 && $stock <10){
    $message = 'Low stock';
}
if ($stock ==0){
    $message = 'Out of stock';
}


?>

<?php require_once 'includes/header.php';?>
<main>
<h2>Chocolate</h2>
    <p><?=$message;?></p>
</main>
    <?php include 'includes/footer.php'?>



<!-- <!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 13: include</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">

    
</head>
<body>
    <h1>The Candy Store</h1>
    <h2>Chocolate</h2>
    

    
</body>
</html>
-->