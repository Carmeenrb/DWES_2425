<!-- pag 120-->
<?php 
// Inicializar variables
$nombre = $apellidos = $edad = $posicion = $email = $telefono = "";
$registrar = false;

// Verificar si el formulario fue enviado
$submitted = isset($_GET['submitted']);
if ($submitted) {
    $nombre = htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8');
    $apellidos = htmlspecialchars($_GET['surname'], ENT_QUOTES, 'UTF-8');
    $direccion = htmlspecialchars($_GET['address'], ENT_QUOTES, 'UTF-8');
    $edad = htmlspecialchars($_GET['age'], ENT_QUOTES, 'UTF-8');
    $posicion = htmlspecialchars($_GET['position'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8');
    $telefono = htmlspecialchars($_GET['phone'], ENT_QUOTES, 'UTF-8');
}

?>
<!-- Actividad 8  -->
<?php include '../includes/header.php' ?>

<h1>Actividad 8: metodo POST</h1>
    <h1>Comprobar que se ha enviado un Formulario</h1>
<?php if ($registrar){ ?>
    <h2>Confirmación de Registro</h2>
        <p><strong>Nombre:</strong> <?= $name ?></p>
        <p><strong>Apellido:</strong> <?= $surname ?></p>
        <p><strong>Dirección:</strong> <?= $address ?></p>
        <p><strong>Edad:</strong> <?= $age ?></p>
        <p><strong>Posición:</strong> <?= $position ?></p>
        <p><strong>Email:</strong> <?= $email ?></p>
        <p><strong>Teléfono:</strong> <?= $phone ?></p>
<?php } else{ ?>
    <form method="get" action="registro_get.php">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="surname">Apellido:</label>
            <input type="text" id="surname" name="surname" required><br>

            <label for="address">Dirección:</label>
            <input type="text" id="address" name="address" required><br>

            <label for="age">Edad:</label>
            <input type="text" id="age" name="age" required><br>

            <label for="position">Posición:</label>
            <input type="text" id="position" name="position" required><br>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="phone">Teléfono:</label>
            <input type="tel" id="phone" name="phone" required><br>

            <button type="submit">Registrar</button>
            <p><input type="hidden" name="submitted" value="True"></p>
        </form>
    <?php } ?>
<?php include '../includes/footer.php' ?>