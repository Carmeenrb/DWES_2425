<!--PHP--> 
<?php
    //Paso 1: cambiar la variable name a mi nombre
    $name = "carmen";
    //Paso 2: cambiar la variable precio 
    $price = 2;
?>
<!--HTML-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables</title>
    <link rel="stylesheet" href="RecursosA1/css/styles.css">
</head>

<body>
<h1>The Candy Store</h1>
<h2>Welcome <?php echo $name; ?></h2>
<p>The cost of your candy is
$<?php echo $price; ?> per pack.</p>
</body>

</html>
