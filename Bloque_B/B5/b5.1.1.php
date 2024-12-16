<?php
$texto = "Bienvenidos al blog de entradas entradas";
$texto1 = "Es importante proceder con cuidado al analizar los datos importantes. Este es un ejemplo de cómo generar un resumen mostrando solo las primeras palabras de un texto, asegurando que el contenido sea conciso y directo.";

// cadena sin espacios
// Reemplazamos el espacio por nada 
$txt_sin_espacios= str_replace(" ","",$texto);
$long_sin_espacios=strlen($txt_sin_espacios);
// Palabras claves
$palabras_claves= ["importante","procesar"];

// Contar la frecuencia de cada palabra 
$palabras = preg_split("/\s/",$texto_copiado);



$palabra = str_word_count(strtolower($texto1),1);
$frecuencia = [];
    foreach ($palabras as $palabra) {
        if (isset($frecuencia[$palabra])) { // el isset es para saber si existe la palabra
            $frecuencia[$palabra]++;
        } else {
            $frecuencia[$palabra] = 1;
        }
    }

// Detectar y marcar palabras claves
// copiamos el texto original
$texto_copiado = $texto1;
$palabras = preg_split("/\s/",$texto_copiado);
// COLEGA
// foreach ($palabras_claves as $palabra) {
//     // Usamos preg_replace para envolver las palabras clave en <mark>
//     $texto_marcado = preg_replace(
//         "/\b" . preg_quote($clave, '/') . "\b/i", // Busca la palabra completa (insensible a mayúsculas)
//         "<mark>$clave</mark>",
//         $texto_marcado
//     );
// }

// Generar un resumen del texto mostrado solo las primeras 50 palabras
$palabras = str_word_count($texto1, 1);
$texto_copiado = $texto1;
$palabras = array_slice($palabras, 0, 50);
$texto_copiado = $texto_copiado . "...";

// $palabras_texto = explode(' ', $texto); // Dividimos el texto en palabras
// $resumen = implode(' ', array_slice($palabras_texto, 0, 50)); // Tomamos las primeras 50 palabras

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion de blog</title>
</head>

<body>
    <p><b>Texto original: </b><?= $texto?></p>
    <!-- La frase la pasa a minuscula -->
    <p><b>Lowercase:</b> <?= strtolower($texto) ?></p>
    <!-- La frase la pasa a mayuscula -->
    <p><b>Uppercase:</b> <?= strtoupper($texto) ?></p>
    <!-- Las primeras en mayuscula -->
    <p><b>Uppercase first letter:</b> <?= ucwords($texto) ?></p>
    <!-- Recuento de caracteres -->
    <p><b>Character count:</b> <?= strlen($texto) ?></p>
    <!-- Recuento de caracteres sin espacios -->
    <p><b>Character count:</b> <?= strlen($txt_sin_espacios); ?></p>
    <!-- Recueto de palabras -->
    <p><b>Word count:</b> <?= str_word_count($texto) ?></p>
    <!-- Frecuencia de palabras -->
    <h3>Frecuencia de palabras:</h3>
    <ul>
        <?php foreach ($frecuencia as $palabra => $conteo){ ?>
            <li><?= $palabra ?>: <?= $conteo ?></li>
        <?php }; ?>
    </ul>
    <p>Resumen de las primeras 50 palabras: <?= $texto_copiado?></p>
</body>

</html>