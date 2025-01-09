<!-- ejercicio 4 pag 60  -->
<!-- Implementar nueva pagina de error -->
<?php
    $productos = [0,1,2,4];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando cadena de consulta para seleccionar contenido</title>
</head>
<body>
    <h1>Lista de Productos</h1>
    <ul>
        <?php foreach($productos as $id ){ ?>
                <li><a href="b6.4_product.php?id=<?= $id ?>"><?= $id ?></a></li>
        <?php } ?>
    </ul>

</body>
</html>