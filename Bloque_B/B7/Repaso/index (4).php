<?php
// Ejercicio 3. Validando subidas de ficheros (Pag. 58) - Leer Pag 45
// Inicialización
$moved = false;
$msj = '';
$error = '';
$uploadPath = './uploads/';     // Ruta donde subiremos la img
$max_size = 5242880;            // Tamaño máx en Bytes que puede tener la img
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif',];
$allowedExtensions = ['jpeg', 'jpg', 'png', 'gif',];


// Comprobar petición
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Comprobamos el tamaño
    // $error = ($_FILES['image']['size'] <= $max_size) ? '' : 'too big';

    // Comprobar si la img tiene errores
    if($_FILES['image']['error'] === 0){
        // Comprobamos el tamaño
        $error = ($_FILES['image']['size'] <= $max_size) ? '' : 'too big';

        // Comprobamos si el tipo está permitido
        $type = mime_content_type($_FILES['image']['tmp_name']);
        $error .= in_array($type, $allowedTypes) ? '' : ' wrong type, might be: image/jpeg, image/png, image/gif';

        // Comprobamos si la extensión es correcta
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $error .= in_array($ext, $allowedExtensions) ? '' : ' wrong .ext, might be: .jpeg, .jpg, .png, .gif';

        // Si no hay errores con el tipo ni la extensión, intentamos mover el archivo
        if(!$error){
            // Creamos el nombre del archivo
            $fileName = createFilename($_FILES['image']['name'], $uploadPath);
            $destino = $uploadPath . $fileName;

            // Si las comprobaciones salen bien, movemos la imagen
            $moved = move_uploaded_file($_FILES['image']['tmp_name'], $destino);

            // Mandamos el mensaje de confirmación
            $msj = 'The file has been successfully uploaded and displayed <br><br>';
            $msj .= '<b>File:</b> ' . $_FILES['image']['name'] . '<br>';
            $msj .= '<b>Size:</b> ' . $_FILES['image']['size'] . ' bytes <br><br>';
        }

    }
    else{
        $msj = 'The file could not be uploaded <br>';
    }

    // Si se ha movido, mostramos la imagen
    if($moved === true){
        $msj .= 'Uploaded: <br> <img src="' . $destino . '">';
    }
    else{
        $msj = '<b>Could not upload file:</b>' . $error;
    }
}

// FUNCIÓN QUE VALIDA Y CREA EL NOMBRE DEL ARCHIVO
function createFilename($fileName, $uploadPath){
    // Obtiene el nombre base y la extensión del archivo
    $baseName = pathinfo($fileName, PATHINFO_FILENAME);
    $extension = pathinfo($fileName, PATHINFO_EXTENSION);
    // Reemplazamos cualquier caracter en el nombre que no sea A-z0-9 por un -
    $baseName = preg_replace('/[^A-z0-9]/', '-', $baseName);

    // Inicialización -> Contador
    $i = 0;
    
    // Para evitar que los archivos con nombres duplicados se sobreescriban
    while(file_exists($uploadPath . $fileName)){
        // Creamos el índice a incrementar
        $i = $i+1;
        $fileName = $baseName . '('. $i . ')' . '.' . $extension;
    }

    return $fileName;
}

?>

<!-- HTML -->
<?php include '../includes/header.php'; ?>

<h1>File Uploader</h1> <br>

<?= $msj ?>

<form method="POST" action=<?= $_SERVER['PHP_SELF'] ?> enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
    <input type="file" name="image" accept="image/*" id="image"> <br><br>
    <input type="submit" value="Upload">
</form>

<?php include '../includes/footer.php'; ?>