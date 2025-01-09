<?php
// pagina 28
$productos = [0, 1, 2];
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
        <?php foreach ($productos as $id) { ?>
            <li><a href="b6.1_product.php?id=<?= $id ?>"><?= $id ?></a></li>
        <?php } ?>
    </ul>

</body>

</html>