<?php 
// Mejor aqui un require
include 'Productos.php'; 
$productos = new Productos(1,'Camiseta',15,45);
$productos1 = new Productos(2,'Pantalon',35,25);
$productos2 = new Productos(3,'Vestido',20,30);

?>
<!-- Aqui el include -->
<?php include 'includes/header.php'; ?>
    <table>
        <tr>
            <th>Identificador</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stok</th>
        </tr>
        <tr>
            <td><?= $productos->id?></td>
            <td><?= $productos->nombre?></td>
            <td><?= $productos->precio?></td>
            <td><?= $productos->stock?></td>

        </tr>
        <tr>
            <td><?= $productos1->id?></td>
            <td><?= $productos1->nombre?></td>
            <td><?= $productos1->precio?></td>
            <td><?= $productos1->stock?></td>

        </tr>
        <tr>
            <td><?= $productos2->id?></td>
            <td><?= $productos2->nombre?></td>
            <td><?= $productos2->precio?></td>
            <td><?= $productos2->stock?></td>

        </tr>
    </table>
<?php include 'includes/footer.php'; ?>