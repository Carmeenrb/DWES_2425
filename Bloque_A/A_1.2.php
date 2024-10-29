<!--PHP--> 
<?php
//Paso 1: cambiar la variable name a mi nombre
    $name = "carmen";
//Paso 2: cambiar la variable name a otro nombre
    $name = "ana";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<!--Mostramos la variable name con mi nombre-->
<h2><?php echo $name; ?></h2>
<!--Mostramos la variable name con otro nombre-->
<h2><?php echo $name; ?></h2>
</body>

</html>