<!--PHP-->
<?php
//Saludos
    $saludo='Bienvenido';
    $nombre = 'Manuel';
    $sms = "$saludo $nombre";
//Array de los tipos de novelas 
    $novelas=[
        ['nombre'=> 'Romantica','precio'=> 20,],
        ['nombre'=> 'Misterio','precio'=> 15,],
        ['nombre'=> 'Terror','precio'=> 30,],
        ['nombre'=> 'Fantasia','precio'=> 18,],
        ['nombre'=> 'Historicas','precio'=> 25,],
        ['nombre'=> 'Aventuras','precio'=> 15,],
        
    ];
//Operaciones de 3x2
    //pack noel
    $noel=$novelas[0]['precio'] + $novelas[1]['precio'];
    //pack duende
    $duende=$novelas[2]['precio'] + $novelas[3]['precio'];

//Operaciones descuento 20%
    $novela0= $novelas[0]['precio'] * 0.80;
    $novela1= $novelas[1]['precio'] * 0.80;
    $novela2= $novelas[2]['precio'] * 0.80;
    $novela3= $novelas[3]['precio'] * 0.80;
    $novela4= $novelas[4]['precio'] * 0.80;
    $novela5= $novelas[5]['precio'] * 0.80;

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
    <h3>Ofertas de Navidad: </h3>
    <!--Lista Ofertas de navidad -->
        <ul>
            <li>Novela <?= $novelas[0]['nombre']?>: <?= $novelas[0]['precio']?> €</li>
            <li>Novela de  <?= $novelas[1]['nombre']?>: <?= $novelas[1]['precio']?> €</li>
            <li>Novela de  <?= $novelas[2]['nombre']?>: <?= $novelas[2]['precio']?> €</li>
            <li>Novela de  <?= $novelas[3]['nombre']?>: <?= $novelas[3]['precio']?> €</li>
            <li>Novela de  <?= $novelas[4]['nombre']?>: <?= $novelas[4]['precio']?> €</li>
            <li>Novela de  <?= $novelas[5]['nombre']?>: <?= $novelas[5]['precio']?> €</li>
        </ul>
    <!--Pack ahorro-->
    <h3>Pack Ahorro 3 x 2</h3>
        <ol>
            <li><b>Pack Papa Noel: </b> <?= $novelas[0]['nombre'];?>, <?= $novelas[1]['nombre'];?>, <?= $novelas[5]['nombre'];?> = <?= $noel;?> €</li>
            <li> <b>Pack Duende: </b> <?= $novelas[2]['nombre'];?>, <?= $novelas[3]['nombre'];?>, <?= $novelas[4]['nombre'];?> = <?= $duende;?> €</li>
        </ol>
    <!--Listado del 20% en los libros-->
    <h3>Descuento de un 20%</h3>
    <ul>
        <li><?= $novelas[0]['nombre']?> = <?= $novela0; ?> €</li>
        <li><?= $novelas[1]['nombre']?> = <?= $novela1; ?> €</li>
        <li><?= $novelas[2]['nombre']?> = <?= $novela2; ?> €</li>
        <li><?= $novelas[3]['nombre']?> = <?= $novela3; ?> €</li>
        <li><?= $novelas[4]['nombre']?> = <?= $novela4; ?> €</li>
        <li><?= $novelas[5]['nombre']?> = <?= $novela5; ?> €</li>
    </ul>

</body>
</html>