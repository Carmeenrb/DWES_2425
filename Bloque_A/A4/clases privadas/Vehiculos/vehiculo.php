<?php
class Vehiculo
{
    // Propiedades
    protected string $marca;
    protected string $modelo;
    protected string $matricula;
    protected bool $disponible;
    // Constructor
    public function __construct(string $marca, string $modelo, string $matricula, bool $disponible)
    {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->matricula = $matricula;
        $this->disponible = $disponible;

    }
    // GETTER
    public function getMarca(): string
    {
        return $this->marca;
    }
    public function getmodelo(): string
    {
        return $this->modelo;
    }
    public function getMatricula(): string
    {
        return $this->matricula;
    }
    public function getDisponible(): bool
    {
        return $this->disponible;
    }
    // Funciones
    public function getDetalles()
    {
        return "Marca: {$this->marca}, Modelo: {$this->modelo}, Matricula: {$this->matricula}, Disponible: {$this->disponible} <br>";
    }
    
}
?>