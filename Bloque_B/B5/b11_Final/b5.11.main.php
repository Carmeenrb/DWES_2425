<?php 
require_once "b5.11.Social.php";
// Array de intereses
    $interes=['musica','lectura','juegos de mesa','viajar','comer'];
// Instancias de red social
    $red_social = new Social($interes);
// Agregar nuevo interes
    $interes_nuevo=$red_social->agregarInteres('peliculas');
    if($interes_nuevo){
        $sms="Se ha agregado correctamente el interes";
    }else{
        $sms= "Error, el interes ya existe";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Social</title>
</head>
<body>
    <h2>Red Social: <?= $red_social->getNom()?></h2>
    <h3>Lista de Intereses:</h3>
    <p><?= $red_social->listarString()?></p>
    <h3>Agregar nuevo interes</h3>
    <p><?= $sms;?></p>
    <h3>Mostrar la lista de manera desordenada</h3>
    <p><?= $red_social->mostrarLista()?></p>
    <h2>Mostrar Array de intereses id</h2>
    <p><?php foreach($red_social->generarAsociativo() as $indice => $mostrar){?></p>
        <p><?=$indice?> -> <?=$mostrar?> </p>
    <?php }?>
    <h2>Mostrar Array de interesesid ascendente por id</h2>
    <?php foreach($red_social->ordenarId() as $indice => $mostrar){?>
        <p><?=$indice?> -> <?=$mostrar?> </p>
    <?php }?>
    <h2>Mostrar Array de interesesid ascendente por Nombre</h2>
    <?php foreach($red_social->ordenarNombres() as $indice => $mostrar){?>
        <p><?=$indice?> -> <?=$mostrar?> </p>
    <?php }?>
    <!-- Añadir un nuevo interés -->
    <?php
        $numInterests = $RS->getNumInterests();

        // Modificar manualmente para ver el efecto (para que funcione tiene que poner >)
        if ($RS->addInterest("Fotografía") < $numInterests) {
            header("Location: b5.11.fracias.php");
            exit();
        }
?>
</body>
</html>
