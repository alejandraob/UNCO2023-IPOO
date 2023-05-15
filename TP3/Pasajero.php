<?php

class Pasajero
{
    ///////////////////////////     DENICION DE   ATRIBUTOS           ///////////////////
    private $nombre;
    private $apellido;
    private $nroDni;
    private $nroTel;
    ///Nuevos atributos correspondientes al TP3
    private $nroTicket;
    private $nroAsiento;

    //////////////////////////      DEFINICION DE METODOS            //////////////////////
    ///Metodo Constructor
    public function __construct($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nroDni = $nroDni;
        $this->nroTel = $nroTel;
        $this->nroTicket = $nroTicket;
        $this->nroAsiento = $nroAsiento;
    }
    ///Metodos Getter
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function getNroDni()
    {
        return $this->nroDni;
    }
    public function getNroTel()
    {
        return $this->nroTel;
    }
    public function getNroTicket()
    {
        return $this->nroTicket;
    }
    public function getNroAsiento()
    {
        return $this->nroTicket;
    }
    ///Metodos Setter
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }
    public function setNroDni($nroDni)
    {
        $this->nroDni = $nroDni;
    }
    public function setNroTel($nroTel)
    {
        $this->nroTel = $nroTel;
    }
    public function setNroTicket($nroTicket)
    {
        $this->nroTicket = $nroTicket;
    }
    public function setNroAsiento($nroTicket)
    {
        $this->nroTicket = $nroTicket;
    }
    //////////////////////////
    /*
        Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 
        Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. 
        Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; 
        si solo requiere uno de los servicios prestados entonces el incremento es del 15%. 
        Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
        
        */
    public function darPorcentajeIncremento()
    {
        return 10;
    }


    ///////////////////
    public function __toString()
    {
        return $this->getNombre() . " " . $this->getApellido() . " DNI: " . $this->getNroDni() . " Tel: " . $this->getNroTel() . "\n ";
    }
}
