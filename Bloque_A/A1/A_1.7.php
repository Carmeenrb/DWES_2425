<!--PHP-->
<?php
//Paso 1: Cambiamos el nombre a mi nombre
    $name='Carmen';
//Paso 2: Añadimos un caramelo favorito delante
    $favorites =['Lemon','Chocolate','Toffe','Fudge',];
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7:Echo Shorthand</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
<h2>Welcome <?=$name?></h2>
<!--La posicion 0 ahora es Lemon-->
<p>Your favorite type of candy is: <?=$favorites[0]?></p>
</body>
</html>