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

<?php require_once 'RecursosA1/includes/header.php';?>

<h2>Chocolate</h2>
    <p><?=$message;?></p>

<?php include 'RecursosA1/includes/footer.php';?>


