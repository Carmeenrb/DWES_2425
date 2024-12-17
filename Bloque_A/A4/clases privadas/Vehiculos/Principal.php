<?php
require_once "Parque.php";
require_once "vehiculo.php";
// Instancias vehiculo
$coche1 = new Vehiculo('Seat', 'Ibiza', '111hgw', true);
$coche2 = new Vehiculo('BMW', 'Cascade', '222pgl', false);
$coche = [$coche1, $coche2];
// Instanciar parque
$parque = new Parque('Aena', $coche);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehiculos</title>
</head>

<body>
    <h2>Parking <?= $parque->getNombre() ?></h2>
    <h3>Lista de Vehiculos:</h3>
    <p><?= $parque->listarVehiculos() ?></p>
    <hr>
    <br>
    <h3>Agregar Vehiculos:</h3>
    <p>Vehiculo se ha agregado correctamente:<?= $parque->agregarVehiculo(new Vehiculo('Seat', 'Leon', '333llp', true)) ?>
    </p>
    <hr>
    <br>
    <h3>Listar Disponibles:</h3>
    <p><?= $parque->listarDisponibles() ?></p>
    <hr>
    <br>
    <h3>Eliminar Vehiculos</h3>
    <p>Vehiculo se ha eliminado correctamente:<?= $parque->eliminarVehiculo(new Vehiculo('Seat', 'Leon', '333llp', true)) ?>
    </p>
    <hr>
    <br>
    <h3>Lista de Vehiculos Actualizados:</h3>
    <p><?= $parque->listarVehiculos() ?></p>
</body>

</html>