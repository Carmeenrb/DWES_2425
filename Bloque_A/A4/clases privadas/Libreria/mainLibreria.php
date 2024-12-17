<?php 
require_once "book.php";
require_once "libreria.php";
// Instanciar libros
$book1=new Book("Harry Potter", "J.K Rowling",450);
$book2=new Book("Sobreviviendo", "Carmela",350);
$book3=new Book("Por si las voces vuelven", "Ángel Martin",300);
$book= [$book1, $book2, $book3];
// intanciar lubreria
$libreria1= new Libreria("Athenas", $book);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria</title>
</head>
<body>
    <h2>Libreria: <?=$libreria1->getNom()?></h2>
    <h3>Listado de libros:</h3>
    <p><?=$libreria1->listarLibros()?></p>
    <h3>Añadir libros:</h3>
    <p>Los libros nuevos se han añadido correctamente <?=$libreria1->agregarLibro(new Book("Alicia en su mundo", "Pepa Romero",150))?></p>
    <h3>Lista de libros actualizada</h3>
    <p><?=$libreria1->listarLibros()?></p>
    <h3>Eliminar libro</h3>
    <p>Se ha eliminado correctamente el libro de Alicia en su mundo <?=$libreria1->eliminarLibro(new Book("Alicia en su mundo", "Pepa Romero",150))?></p>
    <h3>Lista de libros actualizada</h3>
    <p><?=$libreria1->listarLibros()?></p>
</body>
</html>