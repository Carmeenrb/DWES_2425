<?php 
// $path= 'img/logo.png';
// Cambiar el path a img/pattern.png
$path = 'img/pattern.png';
// Volver a cambiar el path
$path = 'img/nologo.png';
?>
<?php include 'includes/header.php'; ?>
<?php if (file_exists($path)){?>
<b>Name: </b> <?= pathinfo($path,PATHINFO_BASENAME)?> <br>
<b>Size: </b> <?= pathinfo($filesize)?> bytes<br>
<b>Mime type: </b> <?= mime_content_type($path)?> <br>
<b>Folder: </b> <?= pathinfo($pathinfo,PATHINFO_DIRNAME)?> <br>
<?php } else?>
<p>There is no such file</p>
<?php include 'includes/footer.php'; ?>