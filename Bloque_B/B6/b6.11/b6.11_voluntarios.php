<!-- pagina 176 -->
<?php 
// Lista de eventos disponibles
$eventos=['Ceremonia de apertura','Atletismo','Natacion','Ciclismo','Ceremonia de Clausura'];
?>
<?php include '../includes/header.php' ?>
<h1>Actividad 11</h1>
<h1>Inscripcion de voluntarios para las olimpiadas</h1>

<form action="b6.11_voluntarios.php" method="POST"></form>
<p>Selecciona una casilla de donde quiere ser voluntario: </p>
<input type="checkbox" name="evento" id="evento" value="true">
<?php include '../includes/footer.php' ?>