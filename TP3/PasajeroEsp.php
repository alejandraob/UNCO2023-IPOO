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

    /*
        Implementar el método darPorcentajeIncremento() que retorne el porcentaje que debe aplicarse como incremento según las características del pasajero. 
        Para un pasajero VIP se incrementa el importe un 35% y si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. 
        Si el pasajero tiene necesidades especiales y requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; 
        si solo requiere uno de los servicios prestados entonces el incremento es del 15%. 
        Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
        
        */
        function darPorcentajeIncremento()
        {

            $sillaRuedas= $this->getRequiereSilla();
            $asistenciaGrl=$this->getRequiereAsistencia();
            $comidaEspecial=$this->getRequiereComidaEspecial();
            $incremento=0;

            if ($sillaRuedas && $asistenciaGrl &&  $comidaEspecial) {
                $incremento= 30; // Incremento del 30% si requiere todos los servicios especiales
            } elseif ($sillaRuedas || $asistenciaGrl || $comidaEspecial) {
                $incremento= 15; // Incremento del 15% si requiere al menos uno de los servicios especiales
            } else {
                $incremento= 10; // Incremento del 10% por defecto para pasajeros con necesidades especiales
            }
        
            return $incremento;
        }

   

}


?>