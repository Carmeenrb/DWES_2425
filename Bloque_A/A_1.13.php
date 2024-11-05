<!--PHP-->
<?php
//Saludos
    $saludo='Bienvenido';
    $nombre = 'Manuel';
    $sms = "$saludo $nombre";
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
    //pack duende
    $duende=$precios['terror'] + $precios['fantasia'];

//Operaciones descuento 20%
    $novela0= $precios['romantica'] * 0.80;
    $novela1= $precios['misterio'] * 0.80;
    $novela2= $precios['terror'] * 0.80;
    $novela3= $precios['fantasia'] * 0.80;
    $novela4= $precios['historicas'] * 0.80;
    $novela5= $precios['aventuras'] * 0.80;
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
    <h2><?= $sms;?></h2>
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
    <ul>
        <li><?= $novelas[0]?> = <?= $novela0; ?> €</li>
        <li><?= $novelas[1]?> = <?= $novela1; ?> €</li>
        <li><?= $novelas[2]?> = <?= $novela2; ?> €</li>
        <li><?= $novelas[3]?> = <?= $novela3; ?> €</li>
        <li><?= $novelas[4]?> = <?= $novela4; ?> €</li>
        <li><?= $novelas[5]?> = <?= $novela5; ?> €</li>
    </ul>

</body>
</html>