<?php
require_once "Pasajero.php";
require_once "ResponsableV.php";
/*
Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. 
El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. 
También se desea guardar la información de la persona responsable de realizar el viaje, para ello cree una clase ResponsableV 
que registre el número de empleado, número de licencia, nombre y apellido. 
La clase Viaje debe hacer referencia al responsable de realizar el viaje.
Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. 
Luego implementar la operación que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. 
Se debe verificar que el pasajero no este cargado mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje. */

//Creamos la clase
class Viaje
{
    //Declaracion de los atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros = [];
    private $responsable = [];


    //Constructor de la clase
    public function __construct($codigo, $destino, $cantMaxPasajeros)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->responsable = [];
        $this->pasajeros = [];
        //  $this->responsable=$responsable;
    }
    //Declaracion de los Metodos

    //Metodos Getter y Setter
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getDestino()
    {
        return $this->destino;
    }
    public function setDestino($destino)
    {
        $this->destino = $destino;
    }
    public function getCanMaxPasajeros()
    {
        return $this->cantMaxPasajeros;
    }
    public function setCanMaxPasajeros($cantMaxPasajeros)
    {
        $this->cantMaxPasajeros = $cantMaxPasajeros;
    }
    public function getPasajeros()
    {
        return $this->pasajeros;
    }
    public function setPasajeros($pasajero)
    {
        $this->pasajeros = $pasajero;
    }
    public function getResponsable()
    {
        return $this->responsable;
    }
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;
    }
    ///////////////Metodos para pasajero
    public function insertarPasajero($nombre, $apellido, $nroDni, $nroTel)
    {
        $pasajeroAIngresar = new Pasajero($nombre, $apellido, $nroDni, $nroTel);

        $i = 0;
        $longitud = count($this->getPasajeros());

        if($longitud<$this->getCanMaxPasajeros()){
        while ($i < $longitud) {
            if ($pasajeroAIngresar->getNroDni() == $this->getPasajeros()[$i]->getNroDni()) {

                return false;
            }
            $i++;
        }
        $pasajeroAIngresar->setNombre($nombre);
        $pasajeroAIngresar->setApellido($apellido);
        $pasajeroAIngresar->setNroDni($nroDni);
        $pasajeroAIngresar->setNroTel($nroTel);
        $arreglo = $this->getPasajeros();
        array_push($arreglo, $pasajeroAIngresar);
        $this->setPasajeros($arreglo);
        }else{
            return 2;
        }
        return true;
    }


    public function verPasajerosRegistrados()
    {
        $i = 0;
        $mensaje = "";
        foreach ($this->getPasajeros() as $pasajero) {
            $i++;
            $mensaje .= $i . " - " . $pasajero;
        }
        return $mensaje;
    }

    public function modificarPasajero($nroDni,$nombre, $apellido,  $nroTel)
    {

         $i = 0;
         $corte = false;
        $array_Pasajeros = $this->getPasajeros();
        $longitud = count($this->getPasajeros());

        while ($i < $longitud && !$corte) {
            if ($nroDni === $array_Pasajeros[$i]->getNroDni()) {

                $pasajeroEncontrado =$array_Pasajeros[$i];
                $pasajeroEncontrado->setNombre($nombre);
                $pasajeroEncontrado->setApellido($apellido);
                $pasajeroEncontrado->setNroDni($nroDni);
                $pasajeroEncontrado->setNroTel($nroTel);
               // $this->setPasajeros($array_Pasajeros);
                $corte = true;
            }
            $i++;
        }
        
        $this->setPasajeros($array_Pasajeros);
        return true;
    }

    public function eliminarPasajero($nroDni)
    {
        $i = 0;
        $corte = false;
        $array_Pasajeros = $this->getPasajeros();
        $longitud = count($this->getPasajeros());
        while ($i < $longitud && !$corte) {
            if ($nroDni === $array_Pasajeros[$i]->getNroDni()) {
                unset($array_Pasajeros[$i]);
                $array_Pasajeros = array_values($array_Pasajeros);
                $this->setPasajeros($array_Pasajeros);
                return true;
            }
            $i++;
        }
        return true;
    }
    ///////////////FIN Metodos para pasajero
    ///////////////Metodos para Responsable


    public function insertarResponable($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $ingresarResponsable = new ResponsableV($nroEmpleado, $nroLicencia, $nombre, $apellido);
        $ingresarResponsable->setNroEmpleado($nroEmpleado);
        $ingresarResponsable->setNroLicencia($nroLicencia);
        $ingresarResponsable->setNombre($nombre);
        $ingresarResponsable->setApellido($apellido);
        $arreglo = $this->getResponsable();
        array_push($arreglo, $ingresarResponsable);
        $this->setResponsable($arreglo);

        return true;
    }


    public function verResponsableViaje()
    {
        $i=0;
        $mensaje ="";
        foreach ($this->getResponsable() as $responsable) {
            $i++;
            $mensaje .=$responsable;
        }
        return $mensaje;
    }

    public function modificarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
         $i = 0;
         $corte = false;
        $array_Responsable = $this->getResponsable();
        $longitud = count($this->getResponsable());

        while ($i < $longitud && !$corte) {
            if ($nroEmpleado === $array_Responsable[$i]->getNroEmpleado()) {

                $pasajeroEncontrado =$array_Responsable[$i];
                $pasajeroEncontrado->setNombre($nombre);
                $pasajeroEncontrado->setApellido($apellido);
                $pasajeroEncontrado->setNroLicencia($nroLicencia);
                $corte = true;
            }
            $i++;
        }
        
        $this->setResponsable($array_Responsable);
        return true;
    }

    public function eliminarResponsable($nroEmpleado)
    {
        $i = 0;
        $corte = false;
        $array_Responsable = $this->getResponsable();
        $longitud = count($this->getResponsable());
        while ($i < $longitud && !$corte) {
            if ($nroEmpleado === $array_Responsable[$i]->getNroEmpleado()) {
                unset($array_Responsable[$i]);
                $array_Responsable = array_values($array_Responsable);
                $this->setResponsable($array_Responsable);
                return true;
            }
            $i++;
        }
        return true;
    }


    ///////////////FIN Metodos para pasajero

    public function __toString()
    {
        //Mostramos la informacion que cargamos en nuestro sistema de viaje
        $mensaje = "********** Información Viaje Feliz **********\n";
        $mensaje .= "CODIGO: " . $this->getCodigo() . "\n";
        $mensaje .= "DESTINO: " . $this->getDestino() . "\n";
        $mensaje .= "RESPONSABLE: " . $this->verResponsableViaje(). "\n";
        $mensaje .= "PASAJEROS CANT. MAX: " . $this->getCanMaxPasajeros() . "\n";
        $mensaje .= "PASAJEROS REGISTRADOS: " . count($this->pasajeros) . "\n";

        $mensaje .= $this->verPasajerosRegistrados();

        $mensaje .= "\n";

        return $mensaje;
    }
}
