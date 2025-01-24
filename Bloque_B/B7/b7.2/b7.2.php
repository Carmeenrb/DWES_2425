<!-- Pagina 37 -->

<?php 
$sms = '';
$confirmacion = 'Se ha subido correctamente';
if($_SERVER['REQUEST_METHOD']== 'POST'){
    if($_FILES['image']['error'] === 0){
        // Guardar el sitio temporal 
        $temporal = $_FILES['image']['tmp_name'];
        $ruta = './var/image/' . $_FILES['image']['name'];

        // Si todo funciona movemos la imagen a ese sitio 
        $mover = move_uploaded_file($temporal, $ruta);
        // Mandamos el sms de confirmacion
        $sms = '<b>Fichero:</b>' . $_FILES['image']['name'] . '<br>';
        $sms .= '<b>Size:</b>' . $_FILES['image']['size'] . ' bytes <br>';
        $sms .= 'El archivo se ha cargado correctamente';

    }else{
        $sms = 'No se ha podido cargar el archivo';
    }
    // Comprobar si se ha movido
    if($mover === true){
        $sms .= '<img src="'.$ruta.'">';

    }
    else{
        $sms = 'La imagen no se ha movido <br>';
    }
}
?>
<?php include '../includes/header.php' ?>
<h1>Cargar Archivos</h1>
<p><?= $sms?></p>
<!-- Para incriptar las imagenes (enctype) -->

<form method="POST" action="<?= $_SERVER['PHP_SELF']?> "enctype="multipart/form-data">
    <label for="image"><b>Upload file:</b></label>
        <input type="file" name="image" accept="image/*" id="image"><br>
        <br>
        <input type="submit" value="Upload">
</form>

<?php include '../includes/footer.php' ?>