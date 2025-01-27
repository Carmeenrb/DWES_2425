<?php
$sms = '';
$confirmacion = 'Se ha subido correctamente';
$max_file_size = 2 * 1024 * 1024; // 2MB
$allowed_types = ['image/jpeg', 'image/png'];
$upload_dir = './var/image/';

// Función para validar y limpiar el nombre del archivo
function validar_nombre($nombre, $ruta) {

    // Obtener el nombre base y la extensión del archivo
    $nombre_base = pathinfo($nombre, PATHINFO_FILENAME);
    $extension = pathinfo($nombre, PATHINFO_EXTENSION);

    // Limpiar el nombre base
    $nombre_base = preg_replace('/[^A-Za-z0-9\-]/', '_', $nombre_base);

    // Crear la ruta del archivo de destino
    $archivo = $nombre_base . '.' . $extension;

    // Evitar sobreescribir archivos existentes
    $contador = 0;
    
    while (file_exists($ruta . $archivo)) {
        $contador++;
        $archivo = $nombre_base . '_' . $contador . '.' . $extension;
    }

    return $archivo;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];

        // Validación del tamaño del archivo
        if ($file_size > $max_file_size) {
            $sms = 'El archivo es demasiado grande. El tamaño máximo permitido es 2MB.';
        }
        // Validación del tipo de archivo
        elseif (!in_array($file_type, $allowed_types)) {
            $sms = 'Solo se permiten archivos en formato .jpeg o .png.';
        }
        else {
            // Limpiar y validar el nombre del archivo
            $new_file_name = validar_nombre($file_name, $upload_dir);
            $ruta_completa = $upload_dir . $new_file_name;

            // Mover el archivo a la ruta especificada
            if (move_uploaded_file($file_tmp, $ruta_completa)) {
                $sms = '<b>Fichero:</b>' . $new_file_name . '<br>';
                $sms .= '<b>Size:</b>' . $file_size . ' bytes <br>';
                $sms .= 'El archivo se ha cargado correctamente.';
                $sms .= '<br><img src="' . $ruta_completa . '" alt="Imagen subida">';
            }
            else {
                $sms = 'No se ha podido mover el archivo.';
            }
        }
    }
    else {
        $sms = 'No se ha podido cargar el archivo.';
    }
}
?>

<?php include '../includes/header.php' ?>
<h1>Cargar Archivos</h1>
<p><?= $sms ?></p>
<!-- Para incriptar las imagenes (enctype) -->
<!-- el php_self lo que hace es llamar a la misma pagina -->
<form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
    <input type="file" name="image" accept="image/jpeg, image/png" id="image"><br>
    <br>
    <input type="submit" value="Upload">
</form>

<?php include '../includes/footer.php' ?>