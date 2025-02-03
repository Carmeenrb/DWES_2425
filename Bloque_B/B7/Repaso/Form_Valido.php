<?php
// Inicializacion 
// formulario
// Creamos los arrays
$usuario = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
    'genero' => '',
    'check' => '',

];
$error = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
    'genero' => '',
    'check' => '',

];
$datos = [
    'nombre' => '',
    'edad' => '',
    'correo' => '',
    'telefono' => '',
    'sms' => '',
    'genero' => '',
    'check' => '',
];

// imagenes gd
$mover_gd = false;
$nombre_arch_gd = '';
$mensaje_gd = '';
$sms_error = '';
$ruta_gd = 'uploads/';
$ruta_miniatura_gd = 'uploads/thumbs/';
$tam_max = 5 * 1024 * 1024;
$tipo_permitido = ['image/jpeg', 'image/png', 'image/gif',];
$tipo_exts = ['jpeg', 'jpg', 'png', 'gif',];

// imagenes imagick
$mover_ik = false;
$nombre_arch_ik = '';
$mensaje_ik = '';
$ruta_imk = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
$ruta_miniatura_imk = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'thumbs' . DIRECTORY_SEPARATOR;


// FUNCIONES 
function create_filename($nombre_archivo, $ruta)
{

    $nomb_base = pathinfo($nombre_archivo, PATHINFO_FILENAME);                       //Capturamos el nombre base
    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION);                      //capturamos la extension
    $nomb_base = preg_replace('/[^A-z0-9]/', '-', $nomb_base);      // Limpiamos el nombre base
    $nombre_archivo = $nomb_base . '.' . $extension;                                               // Añadimos la extension con el nombre limpio
    // contador 
    $contador = 0;

    while (file_exists($ruta . $nombre_archivo)) {           //Si el archivo existe añadimos un numero
        $contador = $contador + 1;
        $nombre_archivo = $nomb_base . $contador . '.' . $extension;
    }
    return $nombre_archivo;
}

// FUNCION - Redimencionar imagen con GD
function resize_image_gd($orig_path, $new_path, $max_width, $max_height)
{

    // Inicializacion
    $imagen_data = getimagesize($orig_path);
    $orig_width = $imagen_data[0];                          // Ancho
    $orig_height = $imagen_data[1];                         // Alto
    $media_tipo = $imagen_data['mime'];                     // Media
    $new_width = $max_width;                                //Inicializamos el maximo 
    $new_height = $max_height;
    $orig_ratio = $orig_width / $orig_height;               // Ratio original

    // Calculamos el nuevo tamaño
    if ($orig_width > $orig_height) {
        $new_height = $new_width / $orig_ratio;             //si es landscape -> Set heiht usando el ratio
    } else {
        $new_width = $new_height * $orig_ratio;             // Si no, es un portrait -> set width usando el ratio
    }

    // Convertimos las dimensiones en int
    $new_width = (int) round($new_width);
    $new_height = (int) round($new_height);

    // switch de casos
    switch ($media_tipo) {
        case 'image/gif':
            $orig = imagecreatefromgif($orig_path);
            break;
        case 'image/jpeg':
            $orig = imagecreatefromjpeg($orig_path);
            break;
        case 'image/png':
            $orig = imagecreatefrompng($orig_path);
            break;
    }

    // Creamos la nueva imagen 
    $new = imagecreatetruecolor($new_width, $new_height);

    // Creamos una copia de la nueva imagen con las nuevas dimensiones
    imagecopyresampled($new, $orig, 0, 0, 0, 0, $new_width, $new_height, $orig_width, $orig_height);

    // Guardamos la imagen
    switch ($media_tipo) {
        case 'image/gif':
            $result = imagegif($new, $new_path);
            break;
        case 'image/jpeg':
            $result = imagejpeg($new, $new_path);
            break;
        case 'image/png':
            $result = imagepng($new, $new_path);
            break;
    }

    return $result;
}

// FUNCION - Redimencionar imagen con GD
function resize_image_imagick($source, $ruta_min)
{
    $imagen = new Imagick($source);
    $imagen->cropThumbnailImage(200, 200);             //Si le añadimos 3 parametros (200,200,true) respeta la dimension de la img (Landscape o Portrait)

    // Guardamos la imagen 
    return $imagen->writeImage($ruta_min);
}

// COMPROBAR PETICION 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validar
    $filtros['nombre']['filter'] = FILTER_VALIDATE_REGEXP; // o el filter sanitare string
    $filtros['nombre']['options']['regexp'] = '/[A-z]{3,}/';
    $filtros['edad']['filter'] = FILTER_VALIDATE_INT;
    $filtros['edad']['options']['min_range'] = 18;
    $filtros['edad']['options']['max_range'] = 65;
    $filtros['correo'] = FILTER_VALIDATE_EMAIL;
    $filtros['telefono']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['telefono']['options']['regexp'] = '/[0-9]{9}/';
    $filtros['sms']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['sms']['options']['regexp'] = '/[A-z]{1,50}/';
    $filtros['genero']['filter'] = FILTER_VALIDATE_REGEXP;
    $filtros['genero']['options']['regexp'] = '/^(masculino|femenino|otro)$/';  // Validamos los valores permitidos
    $filtros['check'] = FILTER_VALIDATE_BOOLEAN;  // Verifica si el checkbox está marcado


    // Validar entradas
    $usuario = filter_input_array(INPUT_POST, $filtros);

    $datos = filter_var_array($usuario, $filtros);


    // Validar los errores
    $error['nombre'] = $usuario['nombre'] ? '' : 'Debe de escribir un nombre';
    $error['edad'] = $usuario['edad'] ? '' : 'La edad debe estar entre 18 y 65 años';
    $error['correo'] = $usuario['correo'] ? '' : 'El correo no es valido';
    $error['telefono'] = $usuario['telefono'] ? '' : 'El telefono no es correcto';
    $error['sms'] = $usuario['sms'] ? '' : 'Debe de tener al menos 3 caracteres';
    $error['genero'] = $usuario['genero'] ? '' : 'Debe seleccionar un género';
    $error['check'] = isset($usuario['check']) && $usuario['check'] ? '' : 'Debe aceptar los términos y condiciones';

    // Si hay errores
    $invalid = implode($error);
    if ($invalid) {
        $sms = 'Por favor, corrige los errores';

    } else {
        $sms = 'Gracias!, los datos son correctos';
        // Aqui se mandaria a la base de datos 
    }

    // Aplicar los filtros de saneamiento 
    $datos['nombre'] = filter_var($datos['nombre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $datos['edad'] = filter_var($datos['edad'], FILTER_SANITIZE_NUMBER_INT);
    $datos['correo'] = filter_var($datos['correo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $datos['telefono'] = filter_var($datos['telefono'], FILTER_SANITIZE_NUMBER_INT);
    $datos['sms'] = filter_var($datos['sms'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $datos['genero'] = filter_var($usuario['genero'], FILTER_SANITIZE_STRING);
    $datos['aceptar_condiciones'] = isset($usuario['aceptar_condiciones']) ? true : false;


    // Imagen con GD
    // Comprobamos si hay error en el tamaño de la imagen 
    $sms_error = ($_FILES['image_gd']['error'] === 1) ? 'Tamaño grande gd' : '';

    if ($_FILES['image_gd']['error'] === 0) {
        $sms_error .= ($_FILES['image_gd']['size'] <= $tam_max) ? '' : 'Tamaño grande gd'; // Tamaño de la imagen

        // Comprobamos el tipo y extension de la imagen 
        $tipo = mime_content_type($_FILES['image_gd']['tmp_name']);
        $sms_error .= in_array($tipo, $tipo_permitido) ? '' : 'tipo incorrecto de imagen gd ';

        $ext = strtolower(pathinfo($_FILES['image_gd']['name'], PATHINFO_EXTENSION));
        $sms_error .= in_array($ext, $tipo_exts) ? '' : 'extension incorrecta de imagen gd';

        // Si no hay errores creamos la Ruta + Movemos la img + Guardamos el Thumb + Redimensionamos
        if (!$sms_error) {
            $nombre_arch_gd = create_filename($_FILES['image_gd']['name'], $ruta_gd);
            $destino_gd = $ruta_gd . $nombre_arch_gd;
            $ruta_min_gd = $ruta_miniatura_gd . 'thumb_' . $nombre_arch_gd;
            $mover_gd = move_uploaded_file($_FILES['image_gd']['tmp_name'], $destino_gd);
            $redimensionar_gd = resize_image_gd($destino_gd, $ruta_min_gd, 200, 200);
        }
    }

    // Si todo ha ido bien
    if ($mover_gd === true and $redimensionar_gd === true) {
        $mensaje_gd = '<img src ="' . $ruta_min_gd . '">';
    } else {
        $mensaje_gd = '<p><b>No se pudo cargar el archivo</b></p> ' . $sms_error;
    }

    // IMAGICK
    // Comprobamos si hay error en el tamaño de la imagen 
    $sms_error = ($_FILES['imagick']['error'] === 1) ? 'Tamaño grande imagick ' : '';

    if ($_FILES['imagick']['error'] === 0) {
        $sms_error .= ($_FILES['imagick']['size'] <= $tam_max) ? '' : 'Tamaño grande imagick'; // Tamaño de la imagen

        // Comprobamos el tipo y extension de la imagen 
        $tipo = mime_content_type($_FILES['imagick']['tmp_name']);
        $sms_error .= in_array($tipo, $tipo_permitido) ? '' : 'tipo incorrecto imagick';

        $ext = strtolower(pathinfo($_FILES['imagick']['name'], PATHINFO_EXTENSION));
        $sms_error .= in_array($ext, $tipo_exts) ? '' : 'extension incorrecta imagick';

        // Si no hay errores creamos la Ruta + Movemos la img + Guardamos el Thumb + Redimensionamos
        if (!$sms_error) {
            $nombre_arch_ik = create_filename($_FILES['imagick']['name'], $ruta_imk);
            $destino_ik = $ruta_imk . $nombre_arch_ik;
            $ruta_min_final = $ruta_miniatura_imk . 'thumb_' . $nombre_arch_ik;
            $mover_ik = move_uploaded_file($_FILES['imagick']['tmp_name'], $destino_ik);
            $redimensionar_ik = resize_image_imagick($destino_ik, $ruta_min_final);
        }
    }

    // Variable para la imagen
    $img = './uploads/thumbs/thumb_' . $nombre_arch_ik;

    // Si todo ha ido bien
    if ($mover_ik === true and $redimensionar_ik === true) {
        $mensaje_ik = '<img src ="' . $img . '">';     // mostramos la imagen
    } else {
        $mensaje_ik = '<p><b>No se pudo cargar el archivo</b></p> ' . $sms_error;
    }
}

?>
<?php include '../includes/header.php' ?>
<h1>Formulario de contacto</h1><br>
<form action="Form_Valido.php" method="POST" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre" value="<?= $datos['nombre'] ?>">
    <span style="color: red;" class="error"><?= $error['nombre'] ?></span><br><br>

    Edad: <input type="text" name="edad" value="<?= $datos['edad'] ?>">
    <span style="color: red;" class="error"><?= $error['edad'] ?></span><br><br>

    Correo: <input type="text" name="correo" value="<?= $datos['correo'] ?>">
    <span style="color: red;" class="error"><?= $error['correo'] ?></span><br><br>

    Telefono: <input type="text" name="telefono" value="<?= $datos['telefono'] ?>">
    <span style="color: red;" class="error"><?= $error['telefono'] ?></span><br><br>

    Mensaje: <input type="text" name="sms" value="<?= $datos['sms'] ?>">
    <span style="color: red;" class="error"><?= $error['sms'] ?></span><br><br>

    <!-- Genero -->
    <label>Género</label>
    <select name="genero">
        <option value="">Seleccionar una opcion</option>
        <option value="masculino"><?= ($datos['genero'] === 'masculino') ? 'selected' : '' ?>Masculino</option>
        <option value="femenino"><?= ($datos['genero'] === 'femenino') ? 'selected' : '' ?>Femenino</option>
    </select><br>
    <span style="color: red;" class="error"><?= $error['genero'] ?></span><br>

    <!-- Condiciones -->
    <label>
        <input type="checkbox" name="check" value="1" <?= (isset($datos['check']) && $datos['check'] == 1) ? 'checked' : '' ?>>
        Acepto los términos y condiciones
    </label><br>
    <span style="color: red;" class="error"><?= $error['check'] ?></span><br><br>
    <br>

    <!-- IMAGEN -->
    <!-- Hacerlo con gb -->
    <label for="image"><b>Upload file GD:</b></label>
    <input type="file" name="image_gd" accept="image/*" id="image_gd"><br>
    <input type="submit" value="upload"><br>
    <?= $mensaje_gd ?><br>

    <!-- Hacerlo con imagick -->
    <label for="image"><b>Upload file imagick:</b></label>
    <input type="file" name="imagick" accept="image/*" id="imagick"><br>
    <input type="submit" value="upload"><br>

    <?= $mensaje_ik ?><br>
    <input type="submit" value="Save">
</form>
<br>


<?php if ($_SERVER['REQUEST_METHOD'] === 'POST') { ?>
    <h2>Resultados:</h2>
    <pre><?php var_dump($datos); ?></pre>
<?php } ?>

<?php if (!empty($sms)) { ?>
    <div style="<?= $invalid ? 'color: red;' : 'color: green;' ?>">
        <h3><?= htmlspecialchars($sms) ?></h3>
    </div>
<?php } ?>