<?php 
// UTILIZANDO GD pag 58
// inicializar
$moved = false;
$mensaje = '';
$error = '';
$ruta = 'uploads/'; 
$ruta_miniatura = 'uploads/thumbs/';
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
function resize_image_gd($orig_path,$new_path,$max_width,$max_height){
    
    // Inicializacion
    $imagen_data = getimagesize($orig_path);
    $orig_width = $imagen_data[0];                          // Ancho
    $orig_height = $imagen_data[1];                         // Alto
    $media_tipo = $imagen_data['mime'];                     // Media
    $new_width = $max_width;                                //Inicializamos el maximo 
    $new_height = $max_height;
    $orig_ratio = $orig_width / $orig_height;               // Ratio original

    // Calculamos el nuevo tamaño
    if($orig_width > $orig_height){
        $new_height = $new_width / $orig_ratio;             //si es landscape -> Set heiht usando el ratio
    }
    else{
        $new_width = $new_height * $orig_ratio;             // Si no, es un portrait -> set width usando el ratio
    }

    // Convertimos las dimensiones en int
    $new_width = (int)round($new_width);
    $new_height = (int)round($new_height);

    // switch de casos
    switch($media_tipo){
        case 'image/gif':
            $orig = imagecreatefromgif($orig_path);
            break;
        case 'image/jpeg' :
            $orig = imagecreatefromjpeg($orig_path);
            break;
        case 'image/png' :
            $orig = imagecreatefrompng($orig_path);
            break;
    }

    // Creamos la nueva imagen 
    $new = imagecreatetruecolor($new_width,$new_height);

    // Creamos una copia de la nueva imagen con las nuevas dimensiones
    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);

    // Guardamos la imagen
    switch($media_tipo) {
        case 'image/gif' : 
            $result = imagegif($new, $new_path);  
            break;
        case 'image/jpeg':
            $result = imagejpeg($new, $new_path);
            break;
        case 'image/png' :
            $result = imagepng($new, $new_path);
            break;
    }

    return $result;
}

// Comprobar peticion 
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // Comprobamos si hay error en el tamaño de la imagen 
    $error = ($_FILES['image']['error'] === 1) ? 'Tamaño grande ' : '';

    if ($_FILES['image']['error'] === 0) {
        $error  .= ($_FILES['image']['size'] <= $tam_max) ? '' : 'Tamaño grande '; // Tamaño de la imagen

        // Comprobamos el tipo y extension de la imagen 
        $tipo   = mime_content_type($_FILES['image']['tmp_name']);        
        $error .= in_array($tipo, $tipo_permitido) ? '' : 'tipo incorrecto ';

        $ext    = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $tipo_exts) ? '' : 'extension incorrecta';

        // Si no hay errores creamos la Ruta + Movemos la img + Guardamos el Thumb + Redimensionamos
        if (!$error) {
            $nombre_arch    = create_filename($_FILES['image']['name'], $ruta);
            $destino = $ruta . $nombre_arch;
            $ruta_min   = $ruta_miniatura . 'thumb_' . $nombre_arch;
            $mover       = move_uploaded_file($_FILES['image']['tmp_name'], $destino);
            $redimensionar     = resize_image_gd($destino, $ruta_min, 200, 200);
        }
    }

    // Si todo ha ido bien
    if($mover === true and $redimensionar === true){
        $mensaje = '<img src ="' . $ruta_min . '">'; 
    }
    else{
        $mensaje = '<p><b>No se pudo cargar el archivo</b></p> ' . $error;
    }
}
?>

<!-- HTML -->
<?php include '../includes/header.php' ?>

    <form method="POST" action=<?= $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
        <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <input type="submit" value="upload">
    </form>

    <?= $mensaje ?>
    
<?php include '../includes/footer.php' ?>

