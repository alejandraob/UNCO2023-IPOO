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
    //////////////////////////
    /*
        Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 
        Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. 
        Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; 
        si solo requiere uno de los servicios prestados entonces el incremento es del 15%. 
        Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
        
        */
        function darPorcentajeIncremento()
        {
            //se incrementa el importe un 35%
            $incremento=35;
            $milla= $this->getCantidadMilla();

            if($milla>300){
                $incremento+30; // Incremento adicional si la cantidad de millas es mayor a 300
            }
            return $incremento;
        }
      function pasajeroRegistro(){
            $nombre=$this->getNombre();
            $apellido=$this->getApellido();
            $dni=$this->getNroDni();
            $tel=$this->getNroTel();
            $ticket=$this->getNroTicket();
            $nroViajeroFre=$this->getNroViajeroFrecuente();
            $cantidadMilla=$this->getCanMaxPasajeros();

      
            $pasajero=$nombre . " " . $apellido . " | DNI: " . $dni . " | Tel: " . $tel . " | NRO Ticked: ".$ticket." | Asiento: ".$asiento." | Requiere silla?: ".($silla(true)? 'SI':'NO')." | Requiere Asitencia?: ".($asistente(true)? 'SI':'NO')." | Comida Especial?: ".($comidaEsp(true)? 'SI':'NO')."\n";
    
            return $pasajero;
        }

    ///////////////////
    function __toString()
    {
        $pasajero=$this->pasajeroRegistro();
        return $pasajero;
    }


?>
