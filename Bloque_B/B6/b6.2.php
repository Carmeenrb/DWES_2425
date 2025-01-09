<?php
// pagina 38
// Paso 2: Añadimos tokio
    // $ciudades = ['London' ,'Sydney','NYC','Tokio'];
    $cities =[
        'London' => '48 Store Street, WC1E 7BS',
        'Sydney' => '151 Oxford Street,2021',
        'NYC' => '1242 7th Street,10492',
        // Paso 2: Añadimos tokio
        'Tokio' => '123 Sakura Street, 100-0001',
    ];
    $city = $_GET['city'] ?? '';
    
    if($city){
        $address = $cities[$city];
    }else{
        $address = 'Please select a city';
    }

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

        <?php foreach($cities as $ciudad => $value){ ?>
                <a href="b2.php?city=<?= $ciudad ?>"><?= $ciudad ?></a>
        <?php } ?>
        <!-- Paso 1: Probar con tokio para que nos de error ya que no esta -->
        <a href="b2.php?city=tokio">Tokio</a>
        <p><?= $address ?></p>


</body>
</html>