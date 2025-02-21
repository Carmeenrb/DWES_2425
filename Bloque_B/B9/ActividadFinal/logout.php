<?php 
include 'includes/sessions.php';
    // Utilizamos elmetodo de cerrar sesion (sesion.php)
    logout();
    // Redirigimos al usuario a la pagina de login
    header('Location: index.php');
    exit;

?>