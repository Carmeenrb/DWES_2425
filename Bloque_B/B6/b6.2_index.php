<?php
// pagina 38
// Paso 2: Añadimos tokio
    $ciudades = ['London' ,'Sydney','NYC','Tokio'];
?> 

<?php include 'includes/header.php' ?>
<!-- Usando cadena de consulta para seleccionar contenido -->
    <h1>Lista de Ciudades</h1>

        <?php foreach($ciudades as $ciudad ){ ?>
                <a href="b6.2_ciudad.php?city=<?= $ciudad ?>"><?= $ciudad ?></a>
        <?php } ?>
        <!-- Paso 1: Probar con tokio para que nos de error ya que no esta -->
        <!-- <a href="get-2.php?city=tokio"></a> -->

<?php include 'includes/footer.php' ?>