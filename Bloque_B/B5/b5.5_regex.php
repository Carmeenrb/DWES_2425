<?php
// PAGINA 70
// Expresion regular
// [a-z0-9\-\_\.]+\@[a-z]+\.+(es|com) puede ser o .es o .com solo 
// [a-z0-9\-\_\.]+\@[a-z]+\.+[a-z]{2,3}

// Array 
$data = [
    "john.doe@example.com",
    "jane-doe@website.org",
    "invalid-email@com",
    "123-456-7890",
    "987.654.3210",
    "http://www.example.com",
    "https://site.org/path?query=string",
    "not-a-url"
];
// Para validar correos electronicos con preg_match
function validarCorreo($data)
{
    $expresion_c = '/[a-z0-9\-\_\.]+\@[a-z]+\.+[a-z]{2,3}/';
    foreach ($data as $correo) {
        if (preg_match($expresion_c, $correo)) {
            echo "<p>Correo Valido: " . $correo . "</p>";
        } else {
            echo "<p>Correo No Valido: " . $correo . "</p>";
        }

    }
}
// Utilizar preg_match_all para extraer el numero de telefono
function validarTelefono($data)
{
    $expresion_tlf = '/\d{3}(.|-)\d{3}(.|-)\d{4}/';
    foreach ($data as $numero) {
        if (preg_match_all($expresion_tlf, $numero)) {
            echo "<p>Telefono Valido: " . $numero . "</p>";
        } else {
            echo "<p>Telefono No Valido: " . $numero . "</p>";
        }

    }
}
// Utilizar preg_split para dividir una url (no me sale)
function dividirUrl($data)
{
    $expresion_dv = '/\b(?:https?:\/\/)?(?:www\.)?[a-z0-9-]+(\.[a-z]{2,})+(\/[^\s]*)?/i';
    foreach ($data as $numero) {
        if (preg_split($expresion_dv, $numero)) {
            echo "<p>Dividir Url Valido: " . $numero . "</p>";
        } else {
            echo "<p>Dividir Url No Valido: " . $numero . "</p>";
        }

    }
    


}
// Utilizar prega_replace para limpiar las direcciones de correo no validas
function limpiarCorreos($data)
{
    $expresion_lc = '/[a-z0-9\-\_\.]+\@[a-z]+\.+[a-z]{2,3}/';
    foreach ($data as $numero) {
        
        if (preg_match($expresion_lc, $numero)) {
            echo "<p>Correo Valido: " . $numero . "</p>";
        } else {
            $borrar= preg_replace($numero,' ', $numero);
            echo "<p>Correo No Valido: " . $borrar . "</p>";
        }

    }
}

?>
<?php include 'includes/header.php'; ?>
<h1>Validar Correos electronicos: </h1>
<p><?php validarCorreo($data) ?></p>
<h1>Validar Telefonos: </h1>
<p><?php validarTelefono($data) ?></p>
<h1> Dividir una URL: </h1>
<p><?php dividirUrl($data) ?></p>
<h1>Limpiar direcciones de correo no validas: </h1>
<p><?php limpiarCorreos($data) ?></p>
<?php include 'includes/footer.php'; ?>