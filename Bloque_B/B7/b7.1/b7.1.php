<!-- Pagina 25 -->
<?php 
$sms = '';
$confirmacion = 'Se ha subido correctamente';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    if($_FILES['image']['error'] === 0){
        $sms = '<b>Fichero:</b>' . $_FILES['image']['name'] . '<br>';
        $sms .= '<b>Size:</b>' . $_FILES['image']['size'] . ' bytes <br>';
        $sms .= 'El archivo se ha cargado correctamente';
    }else{
        $sms = 'No se ha podido cargar el archivo';
    }
}
?>
<?php include 'includes/header.php' ?>
<h1>Cargar Archivos</h1>
<p><?= $sms?></p>
<!-- Para incriptar las imagenes (enctype) -->
<form method="POST" action="b7.1.php" enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <br>
        <input type="submit" value="Upload">
</form>

<?php include 'includes/footer.php' ?>