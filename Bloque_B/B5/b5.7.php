<?php
// PAGINA 100
// Crear la lista de canciones
$canciones = [
    'Blinding Lights - The Weekend',
    'Estoy enfermo - Pignoise',
    'Levitating - Dua Lipa',
    'One more night - Maroon 5',
    'Feel Good Inc - Gorillaz',
    'Feel Good Inc - Gorillaz',
];
// 1. Agregamos canciones Al inicio de la lista 
// $agregarInicio = array_unshift($canciones,'La mujer de verde - Izal');
// 1.1 Agregar canciones al final de la lista 
// $agregarFinal = array_push($canciones,'Vive La vida - Coldplay');

// 2. Eliminar Canciones: utilizar ininio:array_shift y final:array_pop
// $eliminar_inicio = array_shift($canciones);
// $eliminar_final = array_pop($canciones);
// // 3. Buscar canciones de la lista: utilizar array_search para encontrar la posicion de una cancion en la lista
// $buscar_cancion = array_search('Estoy enfermo - Pignoise', $canciones);
// // 4. Verificar si una cancion esta en la lista: utilizar in_array
// $verificar = in_array('Estoy enfermo - Pignoise', $canciones);
// // 5. Contar el numero de canciones: utilizar count
// $contar = count($canciones);
// 6. Seleccionar canciones aleatorias; utiliza el array_rand
$cancion_aleatoria= array_rand( $canciones );
// 7. Mostrar Lista de reproduccion: Implode
$lista_reproduccion= implode(',', $canciones );
// 8. Dividir la cadena en canciones: utiliza explode
$dividir_lista= explode(',', $lista_reproduccion );
// 9. eliminar duplicados: utiliza array_unique
$duplicado = array_unique( $canciones ); //El duplicado te lo borra 
// 10. Fusionar: utilizar array_merge
// Creamos un nuevo array para fusionarlo
$nuevas_canciones=['La mujer de verde - Izal','Vive La vida - Coldplay'];
$fusion_array_merge= array_merge($canciones,$nuevas_canciones);
?>
<?php include 'includes/header.php'; ?>
<h1>Lista de canciones: </h1>
<?php foreach ($canciones as $cancion) { ?>
    <p><?= $cancion ?></p>
<?php } ?>
<h2>Agregar una cancion al inicio:</h2>
<?= array_unshift($canciones, 'La mujer de verde - Izal'); ?>
<?php foreach ($canciones as $cancion) { ?>
    <p><?= $cancion ?></p>
<?php } ?>
<h2>Agregar una cancion al final:</h2>
<?= array_push($canciones, 'Vive La vida - Coldplay'); ?>
<?php foreach ($canciones as $cancion) { ?>
    <p><?= $cancion ?></p>
<?php } ?>
<h2>Eliminar cancion Inicio: </h2>
<?= array_shift($canciones); ?>
<h2>Eliminar cancion Final: </h2>
<?= array_pop($canciones); ?>
<h2>Buscar una cancion: </h2>
<p><?= array_search('Estoy enfermo - Pignoise', $canciones);?></p>
<h2>Verificar una cancion: </h2>
<?= in_array('Estoy enfermo - Pignoise', $canciones);?>
<h2>Contar el numero de canciones: </h2>
<?= count($canciones);?>
<h2>Cancion aleatoria</h2>
<?= $cancion_aleatoria;?>
<h2>Lista de reproduccion:</h2>
<?= $lista_reproduccion;?>
<h2>Dividir lista:</h2>
<?php foreach ($dividir_lista as $cancion){?>
    <p><?= $cancion?></p>
<?php }?>
<h2>Borrar Duplicado:</h2>
<?php foreach ($duplicado as $cancion){?>
    <p><?= $cancion?></p>
<?php }?>
<h2>Fusion de dos listas de canciones: </h2>
<?php foreach ($fusion_array_merge as $cancion){?>
    <p><?= $cancion?></p>
<?php }?>

<?php include 'includes/footer.php'; ?>