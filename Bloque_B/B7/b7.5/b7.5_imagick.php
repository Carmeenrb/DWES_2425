<?php
// Variables
$extension = ['jpeg', 'jpg', 'png', 'gif'];
$tipo_extension = ['image/jpeg', 'image/png', 'image/gif'];
$maxSize = 5 * 1024 * 1024; // Tamaño máximo 5 MB
$max_width = 200;
$max_height = 200;
$ruta_img = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'imagenes'  . DIRECTORY_SEPARATOR;  // Carpeta para las imágenes
$ruta_img_min = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'imagenes' . DIRECTORY_SEPARATOR . 'img_miniatura'  . DIRECTORY_SEPARATOR;  // Carpeta para las miniaturas
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
            $sms = "El archivo supera el tamaño máximo permitido de 5 MB.";
            exit;
        }

        $extension_archivo = strtolower(pathinfo($nombre_fichero, PATHINFO_EXTENSION));

        // Validar el tipo de archivo
        if (!in_array($extension_archivo, $extension)) {
            $sms = "El tipo de archivo no es permitido. Solo se aceptan JPEG, PNG o GIF.";
            exit;
        }

        // Mover el archivo a su destino (guardar imagen original)
        if (move_uploaded_file($temporal, $destinationPath)) {
            $sms = "Archivo subido exitosamente a $destinationPath.<br>";

            // Crear miniatura
            $miniatura = $ruta_img_min . 'thumb_' . $nombre_fichero;  // Ruta para la miniatura

            // Redimensionar la imagen
            $redimensionar = create_thumbnail($ruta_img, $ruta_img_min);
            if ($redimensionar) {
                $sms .= "Miniatura creada exitosamente en $miniatura.";
            } else {
                $sms .= "Error al crear la miniatura.";
            }

            //recortar la imagen 
            $recortar = create_cropped_thumbnail($ruta_img, $ruta_img_min);
            if ($recortar) {
                $sms .= "Miniatura recortada exitosamente en $miniatura.";
            } else {
                $sms .= "Error al recortar la miniatura.";
            }

        } else {
            $sms = "Error al mover el archivo.";
        }
    } else {
        $sms = "No se ha subido ningún archivo.";
    }
}

// Redimensionar imagen con imagick
function create_thumbnail($ruta_img, $ruta_img_min)
{
    // crear objeto Imagick
    $img = new Imagick($ruta_img);
    // Redimensionar la imagen
    $img->thumbnailImage(200, 200, true, true);
    // Guardar la imagen en el destino especificado
    $img->writeImage($ruta_img_min);
    return true;
}

// crear un recorte cuadrado 
function create_cropped_thumbnail($ruta_img, $ruta_img_min)
{
    // crear objeto Imagick
    $image = new Imagick($ruta_img);
    // Recortar la imagen
    $image->cropThumbnailImage(200, 200, true);
    // Guardar la imagen en el destino especificado
    $image->writeImage($ruta_img_min);
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
<?php if ($sms) { ?>
    <p><?= $sms ?></p>
<?php } ?>
<?php include '../includes/footer.php' ?>