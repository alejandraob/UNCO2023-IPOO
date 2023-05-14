<?php
include_once("Pasajero.php");
class PasajeroEsp extends Pasajero{
    //Atributos especiales no heredados por la clase padre Pasajero
    private $requiereSilla;
    private $requiereAsistencia;
    private $requiereComidaEspecial;

    //En el metodo constructor heredamos los atributos padre
    public function __construct($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento, $requiereSilla, $requiereAsistencia, $requiereComidaEspecial){
        parent::__construct($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento);
        $this->requiereSilla=$requiereSilla;
        $this->requiereAsistencia=$requiereAsistencia;
        $this->requiereComidaEspecial=$requiereComidaEspecial;
    }

    /////////////////////////Metodos de acceso
    //Getters /////////////////////////////////////
    public function getRequiereSilla(){
        return $this->requiereSilla;
    }  
    public function getRequiereAsistencia(){
        return $this->requiereAsistencia;
    }
    public function getRequiereComidaEspecial(){
        return $this->requiereComidaEspecial;
    }
    //Setters ///////////////////////////////////////////
    public function setRequiereSilla($requiereSilla){
         $this->requiereSilla=$requiereSilla;
    }  
    public function setRequiereAsistencia($requiereAsistencia){
        $this->requiereAsistencia=$requiereAsistencia;
    }
    public function setRequiereComidaEspecial($requiereComidaEspecial){
        $this->requiereComidaEspecial=$requiereComidaEspecial;
    }
    ///////////////////////fin metodos de acceso



   

}


?>