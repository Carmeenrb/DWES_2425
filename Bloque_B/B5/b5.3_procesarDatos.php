<?php 
$nombre= 'Ana';
$mensaje= 'Hola guapa, nos vemos el viernes de manera Urgente';
$correo='ana@gmail.com';
// Eliminar espacios en blanco de inicio y final: Utilizando trim()
$espacios_blanco=trim($mensaje,' ');
echo "<br><b>Mensaje sin espacios ni al inicio ni al final: </b> ".$espacios_blanco;

// Asegurarnos de que el correo este en minuscula
$cadena_minus=strtolower($correo);
echo "<br> <b>Coprobar que el correo este en minusculas: </b>".$cadena_minus;

// Reemplazar ciertas palabras en el mensaje: cambiar palabras inapropiadas por '***'
$palabra_inapropiada= str_replace("nos","***",$mensaje);
echo "<br> <b>Sustituir la palabra no por ***: </b>".$palabra_inapropiada;

// Reemplazo insensible a mayus y minus: reemplazar urgente por prioridad alta
$sustituir_palabra = str_ireplace("urgente","prioridad alta",$mensaje);
echo "<br> <b>Sustituir la palabra urgente por prioridad alta (no diferencia entre minusculas ni mayusculas): </b>".$sustituir_palabra;

// Repetir una cadena para enfatizar: Añadir "!!!" al final del mensaje
$exclamacion = "!";
$enfatizar= str_repeat($exclamacion,3);
echo  "<br> <b>Enftizar el mensaje con exclamaciones: </b>" . $mensaje . $enfatizar;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3: reemplazo de caracteres en una cadena</title>
</head>
<body>
    
</body>
</html>