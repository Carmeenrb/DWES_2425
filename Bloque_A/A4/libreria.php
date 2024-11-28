<?php
class libreria{
    // Propiedades
    public array $libros;
    public string $nombre_libreria;

    public function __construct(array $libros, string $nombre_libreria){
        $this->libros = $libros;
        $this->nombre_libreria = $nombre_libreria;
    }
    // Getter
    public function getLibros(){
        return $this->libros;
    }
    // Metodo para añadir libros a la biblioteca
    public function agregarLibro(string $titulo){
        $this->libros = $titulos;
    }
    // Como alejandro
    public function borrarLibro(string $titulo){
        // Busca en el array si esta ese titulo y devuelve true o false
        $borrar_libro = array_search($titulo,$this->libros);
        if($borrar_libro === true){
            array_splice($this->libros,$borrar_libro,1);  //Cantidad de elemento es el 1 y si le ponemos -1 se emieza a eliminar desde atras Array_pop se carga el ultimo
        }
    }
    // // como navas
    // public function deleteLibro(string $titulo):bool{
    //     foreach($this->$libros as $titulo){
    //         if($titulo === $libros){
    //             unset ($titulos);
    //             $this->libros = array_values($this->libros);
    //             return true;
    //         }
    //     }
    // }

    // Funcion para mostrar
    public function mostrarLibros(){
        
    }

}
?>