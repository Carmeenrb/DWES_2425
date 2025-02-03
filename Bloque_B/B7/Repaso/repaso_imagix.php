<?php 
// UTILIZANDO GD pag 58
// inicializar
$moved = false;
$mensaje = '';
$error = '';
$ruta   = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'uploads'  . DIRECTORY_SEPARATOR;
$ruta_miniatura    = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'thumbs'  . DIRECTORY_SEPARATOR;
$tam_max = 5 * 1024 * 1024;
$tipo_permitido = ['image/jpeg', 'image/png', 'image/gif',];
$tipo_exts = ['jpeg', 'jpg', 'png', 'gif',];

// FUNCION - crear nombre del archivo
function create_filename($nombre_archivo, $ruta){

    $nomb_base = pathinfo($nombre_archivo,PATHINFO_FILENAME);                       //Capturamos el nombre base
    $extension = pathinfo($nombre_archivo,PATHINFO_EXTENSION);                      //capturamos la extension
    $nomb_base = preg_replace('/[^A-z0-9]/','-',$nomb_base);      // Limpiamos el nombre base
    $nombre_archivo = $nomb_base. '.' .$extension;                                               // Añadimos la extension con el nombre limpio
    // contador 
    $contador = 0;

    while (file_exists($ruta . $nombre_archivo)){           //Si el archivo existe añadimos un numero
        $contador = $contador + 1;
        $nombre_archivo = $nomb_base . $contador . '.' .$extension;
    }
    return $nombre_archivo;
}

// FUNCION - Redimencionar imagen con GD
function resize_image_imagick($source,$ruta_min){
    $imagen = new Imagick($source);
    $imagen -> cropThumbnailImage(200,200);             //Si le añadimos 3 parametros (200,200,true) respeta la dimension de la img (Landscape o Portrait)

    // Guardamos la imagen 
    return $imagen -> writeImage($ruta_min);
}

// Comprobar peticion 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Comprobamos si hay error en el tamaño de la imagen 
    $error = ($_FILES['image']['error'] === 1) ? 'Tamaño grande ' : '';

    if ($_FILES['image']['error'] === 0) {
        $error  .= ($_FILES['image']['size'] <= $tam_max) ? '' : 'Tamaño grande '; // Tamaño de la imagen

        // Comprobamos el tipo y extension de la imagen 
        $tipo   = mime_content_type($_FILES['image']['tmp_name']);        
        $error .= in_array($tipo, $tipo_permitido) ? '' : 'tipo incorrecto';

        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $tipo_exts) ? '' : 'extension incorrecta';

        // Si no hay errores creamos la Ruta + Movemos la img + Guardamos el Thumb + Redimensionamos
        if (!$error) {
            $nombre_arch    = create_filename($_FILES['image']['name'], $ruta);
            $destino        = $ruta . $nombre_arch;
            $ruta_min_final = $ruta_miniatura . 'thumb_' . $nombre_arch;
            $mover          = move_uploaded_file($_FILES['image']['tmp_name'], $destino);
            $redimensionar  = resize_image_imagick($destino, $ruta_min_final);
        }
    }
    
    // Variable para la imagen
    $img = './uploads/thumbs/thumb_' . $nombre_arch;

    // Si todo ha ido bien
    if($mover === true and $redimensionar === true){
        $mensaje = '<img src ="' . $img . '">';     // mostramos la imagen
    }
    else{
        $mensaje = '<p><b>No se pudo cargar el archivo</b></p> ' . $error;
    }
}
?>

<!-- HTML -->
<?php include '../includes/header.php' ?>

<?= $mensaje ?>

    <form method="POST" action=<?= $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
        <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <input type="submit" value="upload">
    </form>

<?php include '../includes/footer.php' ?>

