<?php 
// $text = "Total: £444";
// Modificar el texto con un caracter chino por ejemplo
$text="Hola: 汉字"; // necesita mas de un bits para representarlo

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 4: Uso de funciones de cadenas multibyte </title>
</head>
<body>
    <b>Character count using <code>strlen()</code>:</b>
    <?=strlen($text);?>
    <br>
    <b>Character count using <code>mb_strlen()</code>:</b>
    <?=mb_strlen($text);?>
    <br>
    <b>First match of 汉字/漢字, <code>strpos()</code>:</b>
    <?=strpos($text,'汉字');?>
    <br>
    <b>First match of 汉字/漢字, <code>mb_strpos()</code>:</b>
    <?=mb_strpos($text,'汉字');?>
    <br>
</body>
</html>