<?php
class Vehiculo{
    public string $marca;
    public string $modelo;
    public string $matricula;
    public bool $disponible;

    public function __construct(string $marca, string $modelo, string $matricula, bool $disponible){
        $this->marca= $marca;
        $this->modelo= $modelo;
        $this->matricula= $matricula;
        $this->disponible= $disponible;
    }
    public function getDetalles(){
        return "Marca:{$this->marca}, Modelo: {$this->modelo},Matricula: {$this->matricula}";
    }
    public function estaDisponible(){
        if($this->disponible ===1){
            return true;
        }else{
            return false;
        }
    }
}

class Fleet{
    public string $nombre;
    public array $vehiculos;
    // Constructor
    public function __construct(string $nombre, array $vehiculos){
        $this->nombre = $nombre;
        $this->vehiculos= $vehiculos;
    }
    public function agregarVehiculo(Vehiculo $coche){
        $this->vehiculos[]=$coche;
    }
    public function listarVehiculos(){
        $resultado= '';
        foreach($this->vehiculos as $vehiculo){
            $resultado.= "<p>{$vehiculo->marca} {$vehiculo->modelo} {$vehiculo->matricula}</p>";
        }
        return $resultado;
    }
    public function vehiculosDisponibles(){
        $resultado= '';
        foreach($this->vehiculos as $vehiculo){
            if($vehiculo->disponible !== false){
                $resultado.= "<p>{$vehiculo->marca} {$vehiculo->modelo} {$vehiculo->matricula}</p>";
            }
        }
        if($resultado==''){
            return "No se encuentra ningun coche disponible";
        }
        return $resultado;
    }
        
    
}
?>
<?php
$vehiculo1=new Vehiculo('Renault','Megane','265TRR',true);
$vehiculo2=new Vehiculo('Seat','Ibiza','268TPR',false);
$vehiculo3=new Vehiculo('Ford','Mondeo','235TPR',true);

$vehiculo4 = new Vehiculo('Cupra','Formentor','239COR',true);

$vehiculos=[$vehiculo1,$vehiculo2,$vehiculo3];

$fleet= new Fleet('America',$vehiculos);
?>
<?php include 'includes/cabecera_coche.php'; ?>
<h2>Parque de vehiculos: <?=$fleet->nombre?></h2>
<table>
    <tr>
        <th>Vehículos</th>
        <th>Agregar Vehículos</th>
        <th>Lista de vehiculos Actualizada</th>
        <th>Vehiculos disponibles</th>
    </tr>
    <tr>
        <td><p><?=$fleet->listarVehiculos();?></p></td>
        <td>Un Vehiculo agregado <?=$fleet->agregarVehiculo($vehiculo4)?></td>
        <td><?=$fleet->listarVehiculos();?></td>
        <td><?=$fleet->vehiculosDisponibles();?></td>
    </tr>
</table>
<?php include 'includes/footer.php'; ?>



