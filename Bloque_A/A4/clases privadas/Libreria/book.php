<?php 
class Book{
    // Creacion de propiedades
    protected string $titulo;
    protected string $autor;
    protected int $paginas;
    // Creacion del constructor
    public function __construct(string $titulo, string $autor, int $paginas){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->paginas = $paginas;
    }
    // GETTER
    public function getTitulo(): string{
        return $this->titulo;
    }
    public function getautor(): string{
        return $this->autor;
    }
    public function getPaginas(): int{
        return $this->paginas;
    }
    public function getDetalles(): string{
        return "Titulo: {$this->titulo}, Autor: {$this->autor}, Paginas: {$this->paginas}<br>";
    }
}
?>