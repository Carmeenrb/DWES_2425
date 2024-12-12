<?php 
$articulo = " Gout ha asombrado a técnicos, atletas y aficionados no sólo por sus marcas, magistrales para su edad —superó el récord de 200 metros que tenía Peter Norman desde hace 56 años, sino por su desparpajo en la pista, su forma de deslizarse sobre el tartán, su superioridad y su edad: aún no ha cumplido los 17 años. “No sé a cuánto llegará, pero llegará”, asegura Ángel David Rodríguez, exvelocista español, múltiple campeón de España de 100 y 200. “Vi alguna de sus carreras en primavera y ya apuntaba lo que ha confirmado ahora";
// detectar la primera y la última aparicion de una palabra especifica
$posicion1 = strpos($articulo,"años");
$posicion_ultima= strripos($articulo,"años");
// comprobar si el articulo contiene ciertas palabras claves
function comprobar_palabras_claves($articulo):bool{
    $palabras_claves= ["atletas","record"];
    $encontrada = false;
        foreach ($palabras_claves as $palabra) {
            if (str_contains($articulo, $palabra)) {

                $encontrada = true;
                break;  // Sale del bucle si encuentra al menos una palabra clave
            }
        }
        return $encontrada;
        
}
// Extraer partes del texto basadas en subcadenas especificas
$subcadena= "atletas";
$salida=strstr($articulo,$subcadena);
// Comprobar si el texto empieza o termina con ciertas palabras

$cadena_empieza = str_starts_with($articulo,"Buenas");
$cadena_termina = str_ends_with($articulo,"ahora");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 2: Comprobacion de caracteres en una cadena</title>
</head>
<body>
    <h2>Articulo:</h2>
    <p><?=$articulo?></p>
    <p> Primera Posicion: <?=$posicion1?></p>
    <p> Ultima posicion: <?=$posicion_ultima?></p>
    <p>Comprobar si en el articulo que encuntra estas palabras claves: Atletas y record</p>
    <p><?=comprobar_palabras_claves($articulo)?></p>
    <p>Extraer partes del texto basadas en subcadenas especificas: <?= $salida;?></p>
    <p>Comprobar si el articulo empieza por la palabra: Buenas -> <?=$cadena_empieza?></p>
    <p>Comprobar si el articulo termina por la palabra: ahora -> <?=$cadena_termina?></p>

</body>
</html>