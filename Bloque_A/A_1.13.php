<!--PHP-->
<?php
//Saludos

//Array de los tipos de novelas 
$novelas=["Romantica","Misterio","Terror","Fantasía","Hitoricas","Aventuras"];
$precios=[
    'romantica'=> 20,
    'misterio' => 15,
    'terror' => 25,
    'fantasia' => 30,
    'historicas' => 18,
    'aventuras' => 15,
];
?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
    <title>Libreria Carmela</title>
</head>
<body>
    <h1>Libreria Carmela</h1>
    <h2>Ofertas por el dia del libro: </h2>
    <ul>
        <li>Novela <?= $novelas[0]?>: <?= $precios['romantica']?> €</li>
        <li>Novela de  <?= $novelas[1]?>: <?= $precios['misterio']?> €</li>
        <li>Novela de  <?= $novelas[2]?>: <?= $precios['terror']?> €</li>
        <li>Novela de  <?= $novelas[3]?>: <?= $precios['fantasia']?> €</li>
        <li>Novela de  <?= $novelas[4]?>: <?= $precios['historicas']?> €</li>
        <li>Novela de  <?= $novelas[5]?>: <?= $precios['aventuras']?> €</li>
    </ul>
    <h2>Pack Ahorro 2 x 1</h2>
    <ol>
        <li>Pack </li>
    <ol>

    <h2>Descuento de un 20%</h2>

</body>
</html>