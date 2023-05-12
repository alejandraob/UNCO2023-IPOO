<?php
/* Pasajeros estándares, 
Pasajeros VIP 
y Pasajeros con necesidades especiales. 
La clase Pasajero tiene como atributos el nombre, el número de asiento y el número de ticket del pasaje del viaje. 
La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero recuente y cantidad de millas de pasajero. 
La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas, 
asistencia para el embarque o desembarque, o comidas especiales para personas con alergias o restricciones alimentarias.
*/
class Pasajero{
    ///////////////////////////     DENICION DE   ATRIBUTOS           ///////////////////
    private $nombre;
    private $apellido;
    private $nroDni;
    private $nroTel;

    //////////////////////////      DEFINICION DE METODOS            //////////////////////
    ///Metodo Constructor
    public function __construct($nombre, $apellido, $nroDni, $nroTel)
    {
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->nroDni=$nroDni;
        $this->nroTel=$nroTel;
    }
    ///Metodos Getter
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNroDni(){
        return $this->nroDni;
    }
    public function getNroTel(){
        return $this->nroTel;
    }
    ///Metodos Setter
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setNroDni($nroDni){
        $this->nroDni=$nroDni;
    }
    public function setNroTel($nroTel){
        $this->nroTel=$nroTel;
    }
    //////////////////////////
    public function __toString()
    {
        return $this->getNombre()." ".$this->getApellido()." DNI: ".$this->getNroDni()." Tel: ".$this->getNroTel()."\n ";
    }

}
