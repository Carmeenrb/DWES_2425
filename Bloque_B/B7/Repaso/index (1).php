<?php
// Ejercicio 5. Redimensionando Imágenes usando Imagick (Pag. 117)
// Inicialización
$moved         = false;                                       
$msj           = '';                                           
$error         = '';                                           
$upload_path   = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'img'  . DIRECTORY_SEPARATOR;
$thumb_path    = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'thumbs'  . DIRECTORY_SEPARATOR;
$max_size      = 5242880;                                      // Max file size (5MB)
$allowed_types = ['image/jpeg', 'image/png', 'image/gif',];
$allowed_exts  = ['jpeg', 'jpg', 'png', 'gif',];

// FUNCIÓN - Crear Nombre de Archivo
function create_filename($filename, $upload_path){

    $basename   = pathinfo($filename, PATHINFO_FILENAME);      // Captamos el basename
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);     // Captamos la extension
    $basename   = preg_replace('/[^A-z0-9]/', '-', $basename); // Limpiamos el basename
    $filename   = $basename . '.' . $extension;                // Añadimos la extensión con el nombre limpiado
    // Contador
    $i          = 0;

    while (file_exists($upload_path . $filename)) {            // Si el archivo existe le añadimos un i+1 detrás
        $i        = $i + 1;
        $filename = $basename . $i . '.' . $extension;
    }
    return $filename;
}

// FUNCIÓN - Redimensionar Img
function resize_image_imagick($source, $thumb_path){
    $img = new Imagick($source);
    $img->cropThumbnailImage(200, 200); // Create cropped thumbnail
    $img->writeImage($thumb_path);      // Save file

    return true;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Comprobamos el error de tamaño de imagen
    $error = ($_FILES['image']['error'] === 1) ? 'too big ' : '';

    if ($_FILES['image']['error'] == 0) {
        $error  .= ($_FILES['image']['size'] <= $max_size) ? '' : 'too big '; // Check tamaño de imagen
        
        // Comprobamos el Tipo y extensión de la imagen
        $type   = mime_content_type($_FILES['image']['tmp_name']);        
        $error .= in_array($type, $allowed_types) ? '' : 'wrong type ';

        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowed_exts) ? '' : 'wrong file extension ';

        // Si no hay errores creamos la Ruta + Movemos la img + La Redimensionamos
        if (!$error) {
            $filename    = create_filename($_FILES['image']['name'], $upload_path);
            $destination = $upload_path . $filename;
            $thumbpath   = $thumb_path . 'thumb_' . $filename;
            $moved       = move_uploaded_file($_FILES['image']['tmp_name'], $destination);
            $resized     = resize_image_imagick($destination, $thumbpath);
        }
    }

    // Variable para la imagen
    $showImg = './uploads/thumbs/thumb_' . $filename;

    // Si todo ha ido bien y se ha movido
    if ($moved === true and $resized === true) {
        $msj = '<img src="' . $showImg . '">';  // Mostramos el Thumbnail
    } else {
        $msj = '<b>Could not upload file</b> ' . $error;
    }
}
?>




<!-- HTML -->
<?php include '../includes/header.php' ?>

<?= $msj ?>

    <form method="POST" action=<?= $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
        <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <input type="submit" value="upload">
    </form>

<?php include '../includes/footer.php' ?>