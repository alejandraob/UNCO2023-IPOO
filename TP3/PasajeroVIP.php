<?php
include_once("Pasajero.php");
class PasajeroVIP extends Pasajero{
    //Atributos Propios no heredados de la clase Padre
    private $nroViajeroFrecuente;
    private $cantidadMilla;

    public function __construct($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento, $nroViajeroFrecuente, $cantidadMilla){
        parent::__construct($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento);
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
        $this->cantidadMilla=$cantidadMilla;
    }

    ///////////////////////////// Metodos de Acceso
    /////Getters ///////////////////
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }
    public function getCantidadMilla(){
        return $this->cantidadMilla;
    }

    ////Setters
    public function setNroViajeroFrecuente($nroViajeroFrecuente){
       $this->nroViajeroFrecuente=$nroViajeroFrecuente;
    }
    public function setCantidadMilla($cantidadMilla){
       $this->cantidadMilla=$cantidadMilla;
    }
    /////////////// Fin de metodos de Acceso
}




?>