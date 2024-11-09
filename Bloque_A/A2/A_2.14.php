<?php
// variables
$name='Ivy';

$greeting = 'Hello';
// condicional
if($name){
    $greeting = 'Elcome back,' .$name;
}

$prodcutos = 'Lollipop';
// Paso 6: cambiar el valor de cost a 10
//$cost = 2;
$cost = 10;
//bucle
//Paso 7: actualizar el bucle para que se ejecute 20 veces
for ($i=1;$i<=20;$i++){
    $subtotal=$cost *$i;
    $discount = ($subtotal / 100)*($i * 4);
    $totals[$i]=$subtotal - $discount;
}

?>
<?php require 'includes/header.php';?>
<p><?= $greeting;?></p>
<h2><?= $product;?>Discounts</h2>
<table>
    <tr>
        <th>Packs</th>
        <th>Price</th>
    </tr>
    <?php foreach ($totals as $quantity => $price){?>
        <tr>
            <td>
                <?=$quantity?>
                packs<?= ($quantity ===1) ? '': 's' ;?>
            </td>
            <td>
                $<?=$price;?>
            </td>
        </tr>
    <?php }?>
</table>
<?include 'includes/footer.php'?>