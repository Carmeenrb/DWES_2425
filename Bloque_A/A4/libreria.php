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
        $this->libros[] = $titulo;
        
    }
    // Consultar libros
    public function consultarLibros(string $consultar):bool{
        if(in_array($consultar,$this->libros)){
            return true; //Devuelve 1
        }else{
            return false; // No devuelve nada
        }
    }
    // Como alejandro
    public function borrarLibro(string $titulo){
        // Busca en el array si esta ese titulo y devuelve true o false
        $borrar_libro = array_search($titulo,$this->libros);
        if($borrar_libro !== false){
            array_splice($this->libros,$borrar_libro,1);  //Cantidad de elemento es el 1 y si le ponemos -1 se emieza a eliminar desde atras Array_pop se carga el ultimo
        }
    }
    // como navas
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
        $resultado='';
        foreach($this->libros as $titulo){
            $resultado.= "<p>{$titulo}</p>";
        }
        return $resultado;
    }

}
?>
<?php
    include 'includes/header.php'; 
    // Creacion del array
    $libros=['Alas de Sangre','Alas de hierro','El señor de los anillos','El Principito'];
    // Instancia
    $libreria= new Libreria($libros,'Lunera');
?>
<h2>Libreria Libros</h2>
<!-- Mostrar libros -->
<p><?=$libreria->mostrarLibros()?></p>
<!-- Preguntar si el libro se encuentra en el array -->
<h2>Buscar Libro: </h2>
<p>El libro Invisible se encuentra en el array? <?=$libreria->consultarLibros('El Principito')?></p>
<!-- Añadir libros -->
<h2>Añadir Libros:</h2>
<p>El libro Invisible ha sido añadido.<?=$libreria->agregarLibro('Invisible')?></p>
<!-- Eliminar Libros -->
<h2>Eliminar Libro:</h2>
<p>El libro: El señor de los anillos ha sido eliminado<?=$libreria->borrarLibro('El señor de los anillos')?></p>
<!-- Volver a mostrar los libros con las modificaciones realizadas -->
<h2>Libreria Libros Actualizada</h2>
<p><?=$libreria->mostrarLibros()?></p>