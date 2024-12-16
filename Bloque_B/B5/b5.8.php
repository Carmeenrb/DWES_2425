<?php
// PAGINA 116
$canciones_con_reproducciones = [
    'Blinding Lights - The Weekend' => 1500,
    'Estoy enfermo - Pignoise' => 1200,
    'Levitating - Dua Lipa' => 1800,
    'One more night - Maroon 5' => 1600,
    'Feel Good Inc - Gorillaz' => 1700,
];

// 1. Generar un número aleatorio de reproducciones para cada canción
// Actualizamos las reproducciones con valores aleatorios
foreach ($canciones_con_reproducciones as $cancion => $reproducciones) {
    $reproducciones = mt_rand(1, 10); // Generamos un número aleatorio para cada canción
}

// 2. Ordenar las canciones por nombre en orden ascendente
$solo_canciones_asc = array_keys($canciones_con_reproducciones);
sort($solo_canciones_asc);

// 3. Ordenar las canciones por nombre en orden descendente
$solo_canciones_desc = array_keys($canciones_con_reproducciones);
rsort($solo_canciones_desc);

// 4. Ordenar las canciones por el número de reproducciones en orden ascendente
asort($canciones_con_reproducciones);
$ordenada_asc = $canciones_con_reproducciones;
// 5. Ordenar las canciones por el número de reproducciones en orden descendente
arsort($canciones_con_reproducciones);
$ordenada_desc = $canciones_con_reproducciones;
// 6. Ordenar la lista por clave asc: ksort
ksort($canciones_con_reproducciones);
$nombre_asc = $canciones_con_reproducciones;
// 7. Ordenar la lista por clave asc: krsort
krsort($canciones_con_reproducciones);
$nombre_des = $canciones_con_reproducciones;
?>

<?php include 'includes/header.php'; ?>

<h2>1. Generar un número aleatorio de reproducciones para cada canción:</h2>
<?php foreach ($canciones_con_reproducciones as $cancion => $reproducciones) { ?>
    <p><?= $cancion ?> - <?= $reproducciones ?> reproducciones</p>
<?php } ?>

<h2>2. Ordenar lista por nombre Ascendente:</h2>
<?php foreach ($solo_canciones_asc as $cancion) { ?>
    <p><?= $cancion ?></p>
<?php } ?>

<h2>3. Ordenar lista por nombre Descendente:</h2>
<?php foreach ($solo_canciones_desc as $cancion) { ?>
    <p><?= $cancion ?></p>
<?php } ?>

<h2>4. Ordenar por número de reproducciones Ascendente:</h2>
<?php foreach ($ordenada_asc as $cancion => $reproducciones) { ?>
    <p><?= $cancion ?> - <?= $reproducciones ?> reproducciones</p>
<?php } ?>

<h2>5. Ordenar por número de reproducciones Descendente:</h2>
<?php foreach ($ordenada_desc as $cancion => $reproducciones) { ?>
    <p><?= $cancion ?> - <?= $reproducciones ?> reproducciones</p>
<?php } ?>

<h2>6. Ordenar nombre de cancion Ascendente:</h2>
<?php foreach ($nombre_asc as $cancion => $reproducciones) { ?>
    <p><?= $cancion ?> - <?= $reproducciones ?> reproducciones</p>
<?php } ?>

<h2>7. Ordenar nombre de cancion Descendente:</h2>
<?php foreach ($nombre_des as $cancion => $reproducciones) { ?>
    <p><?= $cancion ?> - <?= $reproducciones ?> reproducciones</p>
<?php } ?>

<?php include 'includes/footer.php'; ?>