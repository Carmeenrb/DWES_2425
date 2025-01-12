<!-- pag 135 -->
<?php
// Inicializar variables
$error='';
$nombre = $apellidos = $edad = $posicion = $email = $telefono = "";
$registrar = false;
// Comprobar que la edad debe de estar entre los 8 y 16
function is_number($edad, int $min = 8, int $max = 16): bool{
    return ($edad >= $min and $edad <= $max);
}
// Verificar si el formulario fue enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
    $apellidos = htmlspecialchars($_POST['surname'], ENT_QUOTES, 'UTF-8');
    $edad = htmlspecialchars($_POST['age'], ENT_QUOTES, 'UTF-8');
    $posicion = htmlspecialchars($_POST['position'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_POST['phone'], ENT_QUOTES, 'UTF-8');

    // Validar la edad
    if(!is_numeric($edad) || !is_number((int)$edad)){
        $error= 'La edad debe de estar entre los 8 y 16 años, intentelo de nuevo';
    }
    else{

        $registrar= true;
}
}


?>
<!-- Actividad 8  -->
<?php include '../includes/header.php' ?>

<h1>Actividad 8: metodo POST</h1>
<h1>Comprobar que la edad se encuentra entre 8-16</h1>
<?php if ($registrar) { ?>
    <h2>Confirmación de Registro</h2>
    <p><strong>Nombre:</strong> <?= $nombre ?></p>
    <p><strong>Apellido:</strong> <?= $apellidos ?></p>
    <p><strong>Edad:</strong> <?= $edad ?></p>
    <p><strong>Posición:</strong> <?= $posicion ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>
    <p><strong>Teléfono:</strong> <?= $telefono ?></p>

<?php } else { ?>
        <?php if(!empty($error)){?>
            <p style="color:red;"><?=$error?></p>
        <?php }?>
        <form method="post" action="b6.9_registro_post.php">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="surname">Apellido:</label>
            <input type="text" id="surname" name="surname" required><br>

            <label for="age">Edad:</label>
            <input type="text" id="age" name="age" required><br>

            <label for="position">Posición:</label>
            <input type="text" id="position" name="position" required><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="phone">Teléfono:</label>
            <input type="tel" id="phone" name="phone" required><br>

            <p><input type="submit" value="Save"></p>
        </form>
    <?php } ?>
<?php include '../includes/footer.php' ?>