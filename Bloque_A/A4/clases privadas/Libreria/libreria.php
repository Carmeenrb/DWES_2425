<?php
class Libreria{
    // Propiedades
    protected string $nombre;
    protected array $libros;

    // Constructor
    public function __construct(string $nombre, array $libros){
        $this->nombre = $nombre;
        $this->libros = $libros;
    }
    public function getNom(): string{
        return $this->nombre;
    }
    public function getLibros(): array{
        return $this->libros;
    }
    // Creacion de funciones
    public function agregarLibro(Book $libros): void  {
        $this->libros[]=$libros;
    }
    public function eliminarLibro(Book $book):bool {
        foreach($this->libros as $index => $libro){
            if($libro== $book){
                unset($this->libros[$index]);
                return true;
            }
            
        }
        return false;
    }
    public function listarLibros():string{
        $salida="";
        foreach($this->libros as $libro){
            $salida.= $libro->getDetalles();
        }
        return $salida;
    }
} 
?>