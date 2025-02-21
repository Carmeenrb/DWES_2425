<?php
include 'includes/sessions.php';
if($logged_in){
    header('Location: account.php');
    exit;
}

if($_SERVER['REQUEST_METHOD']== 'POST'){
    $user_email = $_POST['email'];
    $user_password = $_POST['password'];

    if($user_email == $email && $user_password == $password){
        login();
        header('Location: account.php');
        exit;
    }
}
?>

<?php include 'includes/header.php'; ?>

<h1>Iniciar sesión</h1>

<!-- Formulario de login -->
<?php if (isset($error)){?>
    <p style="color:red;"><?= $error; ?></p>
<?php } ?>
<form method="POST" action="login.php">
    <label for="email">Correo electrónico:</label>
    <input type="email" name="email" required>
    <br><br>
    <label for="password">Contraseña:</label>
    <input type="password" name="password" required>
    <br><br>
    <input type="submit" value="Iniciar sesión">
</form>

<?php include 'includes/footer.php'; ?>
