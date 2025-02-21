<!-- Pagina 33 -->
<?php
// Inicializa el mensaje vacío
$mensaje = '';

// Verifica si la cookie 'nombre' ya está definida
if (isset($_COOKIE['nombre'])) {
    // Si la cookie existe, muestra el mensaje de bienvenida
    $nombre = $_COOKIE['nombre'];
    $mensaje = "Bienvenido de nuevo, " . htmlspecialchars($nombre) . "!";
} else {
    // Si la cookie no existe y el formulario fue enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        // Guarda el nombre en la cookie
        setcookie('nombre', $nombre, 0, '/'); // 0 asegura que la cookie se elimina al cerrar el navegador
        $mensaje = "Bienvenido, " . htmlspecialchars($nombre) . "!";
    } else {
        // Si el formulario no ha sido enviado, muestra el formulario
        $mensaje = '<form method="POST" action="b9_1.php">
                        <label for="nombre">Ingresa tu nombre:</label>
                        <input type="text" name="nombre" id="nombre" required>
                        <input type="submit" value="Enviar">
                    </form>';
    }
}
?>

<?php include 'includes/header.php'; ?>

<!-- Mostrar el mensaje de bienvenida o el formulario -->
<?= $mensaje; ?>

<?php include 'includes/footer.php'; ?>
