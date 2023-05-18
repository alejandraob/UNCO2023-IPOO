<?php
include_once("Pasajero.php");
class PasajeroVIP extends Pasajero{
    //Atributos Propios no heredados de la clase Padre
    private $nroViajeroFrecuente;
    private $cantidadMilla;

    public function __construct($nombre, $apellido, $nroDni, $nroTel, $nroAsiento, $nroViajeroFrecuente, $cantidadMilla){
        parent::__construct($nombre, $apellido, $nroDni, $nroTel,$nroAsiento);
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

    //////////////////////////
    /*
        Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 
        Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. 
        */
        function darPorcentajeIncremento()
        {
            //se incrementa el importe un 35%
            $porcentaje=35;
            //si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%
            if($this->getCantidadMilla()>300){
                $porcentaje+=30;
            }
            return $porcentaje;
        }


    ///////////////////
    function __toString()
    {
        $nroViajeroFre=$this->getNroViajeroFrecuente();
        $cantidadMilla=$this->getCantidadMilla();
      

  
        $pasajero=" | Viajero Frecuente NRO: " .$nroViajeroFre. " |Millas acumuladas: ".$cantidadMilla."\n";

        return parent::__toString().$pasajero;
    }

}
?>
