<?php
// pagina 28
$productos = [0, 1, 2];
?>
<?php include 'includes/header.php' ?>
<!DOCTYPE html>
<html lang="en">
    
    <h1>Lista de Productos</h1>
        <?php foreach ($productos as $id) { ?>
            <p><a href="b6.1_product.php?id=<?= $id ?>"><?= $id ?></a></p>
        <?php } ?>
    
<?php include 'includes/footer.php' ?>
