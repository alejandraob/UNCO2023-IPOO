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
class Viaje{
    //Declaracion de los atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private Pasajero $pasajero;
    private ResponsableV $responsable;
  

    //Constructor de la clase
    public function __construct($codigo, $destino, $cantMaxPasajeros, $pasajero, $responsable)
    {
        $this->codigo=$codigo;
        $this->destino=$destino;
        $this->cantMaxPasajeros=$cantMaxPasajeros; 
        $this->pasajero=$pasajero;
        $this->responsable=$responsable;
    }

    //Declaracion de los Metodos

   


    //Metodos Getter y Setter
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino=$destino;
    }
    public function getCanMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCanMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }
    public function getPasajero(){
        return $this->pasajero;
    }
    public function setPasajero($pasajero){
        $this->pasajero=$pasajero;
    }
    public function getResponsable(){
        return $this->responsable;
    }
    public function setResponsable($responsable){
        $this->responsable=$responsable;
    }

    public function __toString(){
        //Mostramos la informacion que cargamos en nuestro sistema de viaje
        $mensaje="********** Información Viaje Feliz **********\n";
        $mensaje.= "CODIGO: ".$this->getCodigo() ."\n";
      $mensaje.= "DESTINO: ".$this->getDestino() ."\n";
        $mensaje.= "PASAJEROS CANT. MAX: ".$this->getCanMaxPasajeros() ."\n";
        $mensaje.= "PASAJEROS REGISTRADOS: ". count($this->pasajeros) ."\n";

        $mensaje.=$this->verPasajerosRegistrados();

        $mensaje.="\n";

        return $mensaje;
    }
}
