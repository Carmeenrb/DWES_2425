<?php
class Productos{
    public int $id;
    public string $nombre;
    public float $precio;
    public int $stock;

    public function __construct(int $id,string $nombre,float $precio=0,int $stock=0){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock= $stock;
    }
}

?>