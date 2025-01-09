<!-- pag 85 -->
<?php
function html_escape(string $string): string{
    return htmlspecialchars($string,ENT_QUOTES|ENT_HTML5, 'UTF-8',true);
}
$sms = $_GET['msg'] ?? 'Click the link above';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 6: Inicio</title>
</head>
<body>
<a href="b6.6_xss.php?msg=<script>alert('XSS')</script>">Haz clic aquí para enviar un mensaje malefico</a>

<a class="badlink" href="b6.6_xss.php?msg=<script scr=js/bad.js></script>">ESCAPING MARKUP</a>
<h1>XSS Example</h1>
<p><?= htmlspecialchars($sms)?></p>
<!-- Usar la función html_escape para escapar el contenido del mensaje -->
<p><?= html_escape($sms) ?></p>

<?php include 'includes/footer.php' ?>