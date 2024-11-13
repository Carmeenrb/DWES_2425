<!-- PHP -->
<?php
function write_logo(){
    echo '<img src="RecursosA1/img/logo.png" alt="logo">';
}
function write_copyright_notice(){
    $year= date('Y');
    echo '&copy; ' . $year;
    // Modificacion Paso 5: escribir el nombre de la empresa
    echo ' The Candy Store';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 3.1:Basic Functions</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>
<body>
    <header>
        <h1><?php write_logo();?>The Candy Store</h1>
    </header>
    <article>
        <h2>Welcome to the Candy Store</h2>
    </article>
    <footer>
        <?php write_logo()?>
        <?php write_copyright_notice()?>
    </footer>
</body>
</html>