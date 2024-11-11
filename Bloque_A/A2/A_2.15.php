<?php
//Variables
$nombre='Ana';
$saludo='Hola';
$mensaje_descuento ='Descuentos del mes';
$contador=1;
$cuota_mensual=30;
$descuento=10;

//Condicional si el nombre es cadena vacia
if($nombre){
    $saludo= 'Bienvenida, ' .$nombre;
}    


//Bucle para crear los precios del paquete 
for($i =1; $i<=12;$i++){
    //Multiplicamos el precio de un mes con la cantidad de meses
    $precio_meses= $cuota_mensual * $i;
   //realizamos el descuento(el descuento se realizara a partir del 2 mes)
    if($precio_meses == 30){
        $desc_final[$i]=$precio_meses;
    }
    else{
        $descuento_meses = $precio_meses - ($precio_meses * 0.1);
        $desc_final[$i]=$descuento_meses;
    }
    
}
?>
<!-- Llamamos a la cabecera el ejercicio -->
<?php require_once 'RecursosA1/includes/cabecera.php';?>
<body>
    
    <h2><?=$saludo;?></h2>
    <h3><?=$mensaje_descuento;?></h3>
    <table>
        <tr>
            <th>Meses</th>
            <th>Precios</th>
        </tr>
        <!-- Creamos un for each para reccores la lsita del array -->
        <?php foreach ($desc_final as $meses => $precio){ ?>
        <tr>
            <td><?=$meses?> mes<?=($meses === 1) ? '': 'es';?></td>
            <td><?=$precio;?> €</td>
        </tr>
        <?php } ?>
    </table>
<?php include 'RecursosA1/includes/footer.php';?>