<!-- PHP -->
<?php
function create_logo(){
    return '<img src="RecursosA1/img/logo.png" alt="logo" />';
}
function create_copyright_notice(){
    $year= date('Y');
    $empresa='The Candy Store';
    //Añadir el nombre de la empresa a la variable $mensaje
    $mensaje= '&copy; ' . $year . '  ' . $empresa;
    return $mensaje;
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.2:Basic Functions</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <header>
        <h1><?php create_logo();?>The Candy Store</h1>
    </header>
    <article>
        <h2>Welcome to the Candy Store</h2>
    </article>
    <footer>
        <?= create_logo()?>
        <?= create_copyright_notice()?>
    </footer>
</body>
</html>
