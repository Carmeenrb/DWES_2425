<?php
class Library{
    public array $libros;
    public string $libraryName;
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