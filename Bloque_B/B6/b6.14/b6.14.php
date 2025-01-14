<!-- pagina 235 -->
<?php 
// Comprobar
// Valor por defecto para IPs no válidas
$defecto_ip = "0.0.0.0";

// Definir opciones de validación para IPs
$opciones = [
    'options' => [
        'default' => $defecto_ip  // Valor por defecto si la IP no es válida
    ],
    'flags' => FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
];

// Validar la IP
$ip = filter_input(INPUT_POST, 'ip', FILTER_VALIDATE_IP, $opciones);
?>

<?php include '../includes/header.php' ?>
<h1>Implementar un formulario para ingresar una IP</h1>
<form action="b6.14.php" method="POST">
    IP: <input type="text" name="ip" id="ip" value="<?= htmlspecialchars($ip) ?>">
    <button type="submit">Enviar</button>
</form>

<?php if ($ip === $defecto_ip) { ?>
    <p style='color: red;'>Ingrese una direccion valida</p>
<?php } else { ?>
    <p style='color: green;'>La dirección IP válida ingresada es: <?= htmlspecialchars($ip) ?></p>
<?php } ?>

<?php include '../includes/footer.php' ?>