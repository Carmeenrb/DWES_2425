<?php 
$text = "Total: £444";

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
    <b>First match of 444<code>strpos()</code>:</b>
    <?=strpos($text,'444');?>
    <br>
    <b>First match of 444 <code>mb_strpos()</code>:</b>
    <?=mb_strpos($text,'444');?>
    <br>
</body>
</html>