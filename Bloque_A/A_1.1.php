<!--PHP--> 
<?php
    //Paso 1: cambiar la variable name a mi nombre
    $name = "carmen";
    //Paso 2: cambiar la variable precio 
    $precio = 2;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
</head>

<body>
<h1>Tienda</h1>
<!--Mostramos la variable name -->
<h2>Bienvenida <?php echo $name; ?></h2>
<!--Mostramos la variable precio -->
<h2>El precio es de:<?php echo $precio; ?></h2>
</body>

</html>