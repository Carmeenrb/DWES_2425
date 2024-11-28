<?php
class book{
    // Propiedades
    public string $titulo;
    public string $autor;
    public int $paginas;

    function __construct(string $titulo,string $autor, int $paginas){
        $this->titulo= $titulo;
        $this->autor= $autor;
        $this->paginas=$paginas;

    }
    // Lo ponemos todo en una frase
    public function libros(): string{
        return "{$this->titulo} por {$this->autor},{$this->paginas}";
    }

}
// Clase library
class Library{
    public array $libros=[];
    // Recibe un objeto de la clase book
    public function agregarBook(Book $libro){
        $this->libros[]=$libro;
    }
    // Metodos para eliminar
    public function eliminarLibro(string $titulo): bool {
        foreach ($this->libros as $index => $libro) {
            if ($libro->titulo === $titulo) {
                unset($this->libros[$index]);
                $this->libros = array_values($this->libros); // Reindexar el array
                return true;
            }
        }
        return false;
    }
    // Metodos para mostrar
    public function mostrarBook(){
        $resultado='';
        foreach($this->libros as $libro){
            $resultado.= "<p>{$libro->libros()}</p>";
        }
        return $resultado;
    }
}
?>
<?php
include 'includes/header.php'; 
$book1=new Book('invisible','Eloy Moreno ',250);
$book2=new Book('Harry Potter','JK Rowling ',450);
$libreria= new Library(); // No recibe nada ya que se rellena dentro
?>

<!-- Agregar libros -->
<h2>Se ha agregado libros a la biblioteca</h2>
<?=$libreria->agregarBook($book1)?>
<?=$libreria->agregarBook($book2)?>
<h2>Mostrar Libros: </h2>
<?=$libreria->mostrarBook()?>
<!-- Eliminar Libros -->
<h2>Se ha borrado un libro de la biblioteca: <?=$libreria->eliminarLibro($book2->titulo)?></h2>
<h2>Libreria Actualizada</h2>
<p><?=$libreria->mostrarBook()?></p>
<?php include 'includes/footer.php'; ?>