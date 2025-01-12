<?php
// pagina 49
    $productos = [0,1,2,4];
?> 
<?php include '../includes/header.php' ?>
    <!-- Usando cadena de consulta para seleccionar contenido -->
    <h1>Lista de Productos</h1>
        <?php foreach($productos as $id ){ ?>
                <p><a href="b6.3_product.php?id=<?= $id ?>"><?= $id ?></a></p>
        <?php } ?>

<?php include '../includes/footer.php' ?>
