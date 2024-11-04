<!--PHP-->
<?php
//Saludos
    $nombre = 'Isabel';
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
//Operaciones de 3x2
//pack noel
    $noel=$precios['romantica'] + $precios['misterio'];
    $duende=$precios['terror'] + $precios['fantasia'];
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
    <h2>Bienvenida <?= $nombre;?></h2>
    <h2>Ofertas de Navidad: </h2>
        <ul>
            <li>Novela <?= $novelas[0]?>: <?= $precios['romantica']?> €</li>
            <li>Novela de  <?= $novelas[1]?>: <?= $precios['misterio']?> €</li>
            <li>Novela de  <?= $novelas[2]?>: <?= $precios['terror']?> €</li>
            <li>Novela de  <?= $novelas[3]?>: <?= $precios['fantasia']?> €</li>
            <li>Novela de  <?= $novelas[4]?>: <?= $precios['historicas']?> €</li>
            <li>Novela de  <?= $novelas[5]?>: <?= $precios['aventuras']?> €</li>
        </ul>
    <h2>Pack Ahorro 3 x 2</h2>
        <ol>
            <li>Pack Papa Noel: <?= $novelas[0];?>, <?= $novelas[1];?>, <?= $novelas[5];?> = <?= $noel;?> €</li>
            <li>Pack Duende:  <?= $novelas[2];?>, <?= $novelas[3];?>, <?= $novelas[4];?> = <?= $duende;?> €</li>
        </ol>
    
    <h2>Descuento de un 20%</h2>

</body>
</html>