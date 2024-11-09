<?php
//Paso 1: Cambiar el nombre a cadena vacia
    $name='';
    $saludo='Hola';
    //Condicional
    //Al ser cadena vacia no entra en la condicional
    if($name !== ''){
        $saludo = "Welcome back, $name";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1: Sentencia if</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
    
</head>
<body>
    <h1>The Candy Store</h1>
    <h2><?=$saludo;?></h2>
</body>
</html>