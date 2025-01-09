<?php
// Función para escapar caracteres especiales en HTML
function html_escape(string $string, int $flags = ENT_QUOTES | ENT_HTML5): string {
    return htmlspecialchars($string, $flags, 'UTF-8', true);
}

// Obtener el mensaje de la cadena de consulta o un mensaje predeterminado si no se proporciona
$sms = $_GET['msg'] ?? 'No se proporcionó ningún mensaje.';

// Probar diferentes opciones de htmlspecialchars para experimentar con los resultados
$options = [
    'ENT_QUOTES | ENT_HTML5' => html_escape($sms, ENT_QUOTES | ENT_HTML5),
    'ENT_NOQUOTES' => html_escape($sms, ENT_NOQUOTES),
    'ENT_COMPAT' => html_escape($sms, ENT_COMPAT),
];
?>
    <!-- xxs ejemplo -->
<?php include 'includes/header.php' ?>

    <h1>Mensaje Recibido</h1>
    <!-- Mostrar el mensaje escapado con diferentes opciones -->
    <p><b>ENT_QUOTES | ENT_HTML5:</b> <?= $options['ENT_QUOTES | ENT_HTML5'] ?></p>
    <p><b>ENT_NOQUOTES:</b> <?= $options['ENT_NOQUOTES'] ?></p>
    <p><b>ENT_COMPAT:</b> <?= $options['ENT_COMPAT'] ?></p>

    <!-- Enlace para regresar a la página principal -->
    <a href="b6.6_index.php">Volver a la página principal</a>
    
<?php include 'includes/footer.php' ?>
