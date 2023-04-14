<?php

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
