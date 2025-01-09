<?php 
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
    <title>Usando cadena de consulta para seleccionar contenido (||)</title>
</head>
<body>
    <h1><?=$city?></h1>
    <p><?= $address ?></p>
    <p><a href="b6.2_index.php">Volver a la lista de ciudades</a></p>
    
</body>
</html>