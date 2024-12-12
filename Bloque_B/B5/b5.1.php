<?php
$texto = "Bienvenidos al blog de entradas";
// cadena sin espacios
// Reemplazamos el espacio por nada 
$txt_sin_espacios= str_replace(" ","",$texto);
$long_sin_espacios=strlen($txt_sin_espacios);

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
</body>

</html>