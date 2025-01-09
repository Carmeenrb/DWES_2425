<?php
// pagina 38
// Paso 2: Añadimos tokio
    $ciudades = ['London' ,'Sydney','NYC','Tokio'];
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usando cadena de consulta para seleccionar contenido</title>
</head>
<body>
    <h1>Lista de Ciudades</h1>

        <?php foreach($ciudades as $ciudad ){ ?>
                <a href="b6.2_ciudad.php?city=<?= $ciudad ?>"><?= $ciudad ?></a>
            
        <?php } ?>
        <!-- Paso 1: Probar con tokio para que nos de error ya que no esta -->
        <!-- <a href="get-2.php?city=tokio"></a> -->


</body>
</html>