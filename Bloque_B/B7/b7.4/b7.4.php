<?php
// Variables
$extension = ['jpeg', 'jpg', 'png', 'gif'];
$maxSize = 5 * 1024 * 1024; // Tamaño máximo 5 MB
$max_width = 200;
$max_height = 200;
$ruta_img = 'imagenes/';  // Carpeta para las imágenes originales
$ruta_img_min = 'imagenes/img_miniatura/';  // Carpeta para las miniaturas
$sms = '';

// Usuarios suben las imágenes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Crear los directorios si no existen
    if (!is_dir($ruta_img)) {
        mkdir($ruta_img, 0777, true); // Crear carpeta de imágenes si no existe
    }
    if (!is_dir($ruta_img_min)) {
        mkdir($ruta_img_min, 0777, true); // Crear carpeta de miniaturas si no existe
    }

    // Verificar si se ha subido un archivo
    if (!empty($_FILES['image']['tmp_name'])) {

        $temporal = $_FILES['image']['tmp_name'];
        $nombre_fichero = basename($_FILES['image']['name']);
        $destinationPath = $ruta_img . $nombre_fichero;  // Ruta donde se guardará la imagen original

        // Validar el tamaño del archivo
        if ($_FILES['image']['size'] > $maxSize) {
            $sms =  "El archivo supera el tamaño máximo permitido de 5 MB.";
            exit;
        }

        $extension_archivo = strtolower(pathinfo($nombre_fichero, PATHINFO_EXTENSION));

        // Validar el tipo de archivo
        if (!in_array($extension_archivo, $extension)) {
            $sms =  "El tipo de archivo no es permitido. Solo se aceptan JPEG, PNG o GIF.";
            exit;
        }

        // Mover el archivo a su destino (guardar imagen original)
        if (move_uploaded_file($temporal, $destinationPath)) {
            $sms =  "Archivo subido exitosamente a $destinationPath.<br>";
            
            // Crear miniatura
            $miniatura = $ruta_img_min . 'thumb_' . $nombre_fichero;  // Ruta para la miniatura

            // Redimensionar la imagen
            if (resize_image_gd($destinationPath, $miniatura, $max_width, $max_height)) {
                $sms .=  "Miniatura creada exitosamente en $miniatura.";
            } else {
                $sms .=  "Error al crear la miniatura.";
            }

        } else {
            $sms =  "Error al mover el archivo.";
        }
    } else {
        $sms =  "No se ha subido ningún archivo.";
    }
}

// Redimensionar imagen
function resize_image_gd($ruta_img, $ruta_img_min, $max_width, $max_height) {
    $img = getimagesize($ruta_img); // Obtener la información de la imagen
    list($orig_width, $orig_height, $type) = $img;

    // Calcular nuevas dimensiones manteniendo la relación de aspecto
    $ratio = $orig_width / $orig_height;
    if ($max_width / $max_height > $ratio) {
        $new_width = $max_height * $ratio;
        $new_height = $max_height;
    } else {
        $new_width = $max_width;
        $new_height = $max_width / $ratio;
    }

    // Mapeo de tipos de imágenes a sus respectivas funciones de carga
    $image_create_functions = [
        IMAGETYPE_JPEG => 'imagecreatefromjpeg',
        IMAGETYPE_PNG  => 'imagecreatefrompng',
        IMAGETYPE_GIF  => 'imagecreatefromgif'
    ];

    // Verificar si el tipo de imagen está soportado
    if (isset($image_create_functions[$type])) {
        // Cargar la imagen usando la función correspondiente
        $orig_image = $image_create_functions[$type]($ruta_img);
    } else {
        return false; // Tipo de imagen no soportado
    }

    // Verificar si la imagen se cargó correctamente
    if ($orig_image === false) {
        $sms = "Error al cargar la imagen.";
        return false;
    }

    // Crear una imagen nueva en blanco
    $nueva_img = imagecreatetruecolor($new_width, $new_height);

    // Redimensionar la imagen
    imagecopyresampled($nueva_img, $orig_image, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);

    // Guardar la imagen redimensionada en la carpeta de miniaturas
    switch ($type) {
        case IMAGETYPE_JPEG:
            imagejpeg($nueva_img, $ruta_img_min);
            break;
        case IMAGETYPE_PNG:
            imagepng($nueva_img, $ruta_img_min);
            break;
        case IMAGETYPE_GIF:
            imagegif($nueva_img, $ruta_img_min);
            break;
    }
    
    // Liberar la memoria
    imagedestroy($orig_image);
    imagedestroy($nueva_img);

    return true;
}

?>
<?php include '../includes/header.php' ?>
    <h1>Subir una imagen</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/jpeg, image/png, image/gif" required>
        <button type="submit">Subir</button>
    </form>
    <!-- Mostrar mensaje -->
    <?php if ($sms){ ?>
        <p><?= $sms ?></p>
    <?php } ?>
    <?php include '../includes/footer.php' ?>