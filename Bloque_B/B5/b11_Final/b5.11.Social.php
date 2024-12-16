<?php
declare(strict_types=1);
class Social
{
    private const NOMBRE = 'Carmelilla';
    private array $intereses;
    private array $interesesId;
    public function __construct(array $intereses, array $interesesId = [])
    {

        $this->intereses = $intereses;
        $this->interesesId = $interesesId;
    }
    public function getNom(): string
    {
        return self::NOMBRE;
    }
    public function getIntereses(): array
    {
        return $this->intereses;
    }
    public function getInteresId(): array
    {
        return $this->interesesId;
    }
    public function generarAsociativo(): array
    {
        $num_max = count($this->intereses);
        $i = 0;

        while (count($this->interesesId) < $num_max) {

            // Generar un número aleatorio entre 1 y num_max
            $generar_num = random_int(0, $num_max - 1);

            // Verificar si el número ya está en el array
            if (!array_key_exists($generar_num, $this->interesesId)) {
                $this->interesesId[$generar_num] = $this->intereses[$i];// Añadir número si no está repetido
                $i++;
            }

        }

        return $this->interesesId;

    }

    // Funcion que convierte un array en un string
    public function listarString(): string
    {
        $lista_string = implode(',', $this->intereses);
        return $lista_string;
    }
    public function mostrarLista()
    {
        //con un ul y solo el array asociativo con el echo 
        foreach ($this->intereses as $value) {
            echo "<ul>";
            echo "<li> {$value}</li>";
            echo "</ul>";
        }
    }
    public function agregarInteres($interes): bool
    {
        // agregar un interes al array
        $encontrado = in_array($interes, $this->intereses);
        // Comprobar si esta repetido
        if ($encontrado == false) {
            array_push($this->intereses, $interes);
            return true;
        } else {
            return false;
        }

    }
    public function ordenarId(): array
    {
        $ordenarId = $this->interesesId;
        // ordenamos el array id asc 
        ksort($ordenarId);

        return $ordenarId;
    }
    public function ordenarNombres(): array
    {
        $ordenarNombres = $this->interesesId;
        asort($ordenarNombres);

        return $ordenarNombres;
    }
    // Comentado
    public function nuevaPag()
    {

    }

}
?>