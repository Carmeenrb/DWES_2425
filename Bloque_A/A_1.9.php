<!--PHP-->
<?php
    $prefix = 'Thank you';
    //Paso 2: cambiar el nombre por el nuestro
    $name = 'Carmen';
    // Paso 3: sustituir la concatenacion por las comillas dobles 
    $message = "$prefix $name";

?>

<!--HTML-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 8: String Operator</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>The Candy Store</h1>
    <p><?= $name?></p>
    <p><?= $message ?></p>
</body>
</html>