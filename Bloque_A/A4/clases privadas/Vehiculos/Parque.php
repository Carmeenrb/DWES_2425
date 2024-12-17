<?php
declare(strict_types= 1);
class Parque{
    protected string $nombre;
    protected array $vehiculo;
    // constructor
    public function __construct(string $nombre, array $vehiculo){
        $this->nombre = $nombre;
        $this->vehiculo = $vehiculo;
    }
    public function getNombre(): string{
        return $this->nombre;
    }
    public function getVehiculo(): array{
        return $this->vehiculo;
    }
    public function AgregarVehiculo(Vehiculo $coche): bool{
        $this->vehiculo[] = $coche;
        return true;
    }
    public function listarVehiculos(): string{
        $salida="";
        foreach($this->vehiculo as $coche){
            $salida .= $coche->getDetalles();
        }
        return $salida;
    }
    public function listarDisponibles(): string{
        $salida="";
        foreach($this->vehiculo as $coche){
            if($coche->getdisponible()){
                $salida .= $coche->getDetalles();
            }
        }
        return $salida;
    }
    public function eliminarVehiculo( Vehiculo $vehiculo): bool{
        foreach($this->vehiculo as $index => $coche){
            if($coche == $vehiculo){
                unset($this->vehiculo[$index]);
                return true;
            }
        }
        return false;
    }
}
?>