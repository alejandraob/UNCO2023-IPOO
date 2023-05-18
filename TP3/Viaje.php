<?php
require_once "Pasajero.php";
require_once "ResponsableV.php";
require_once "PasajeroVIP.php";
require_once "PasajeroEsp.php";
/*
Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método
 venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar
  los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.

Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad 
máxima de pasajeros y falso caso contrario

*/

//Creamos la clase
class Viaje
{
    //Declaracion de los atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros = [];
    private $responsable = [];
    private $costo;
    private $costoAbonado;


    //Constructor de la clase
    public function __construct($codigo, $destino, $cantMaxPasajeros, $costo)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->responsable = [];
        $this->pasajeros = [];
        $this->costo = $costo;
        $this->costoAbonado = 0;
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

    public function getCosto()
    {
        return $this->costo;
    }

    public function setCosto($costo)
    {
        $this->costo = $costo;
    }

    public function getCostoAbonado()
    {
        return $this->costoAbonado;
    }

    public function setCostoAbonado($costoAbonado)
    {
        $this->costoAbonado = $costoAbonado;
    }
//Setear la cantidad maxima de pasajeros
    public function setCantidadMaximaPasajeros($cantMaxPasajeros)
    {
        $resultado=false;
        $CupoTotalPasajero=$this->getCanMaxPasajeros();
        if(is_numeric($cantMaxPasajeros)&& $cantMaxPasajeros>0){
            if($cantMaxPasajeros<=$CupoTotalPasajero){
                $resultado=false;
            }else{
                $this->setCanMaxPasajeros($cantMaxPasajeros);
                $resultado=true;
            }
        }else{
            $resultado=false;
        }
    }

    // Método para verificar si hay pasajes disponibles
    /**
     * @return bool
     */
    public function hayPasajesDisponibles()
    {
        $listaPasajero = $this->getPasajeros();
        return count($listaPasajero) < $this->getCanMaxPasajeros();
    }


    //Metodo para verificar si el pasajero ya esta cargado
    public function existePasajero($objPasajero)
    {
        $resultado = false;
        $listaPasajero = $this->getPasajeros();
        foreach ($listaPasajero as $pasajero) {
            if ($pasajero->getDni() == $objPasajero->getDni()) {
                $resultado = true;
            }
        }
        return $resultado;
    }
//Metodo para agregar un pasajero
    public function agregarPasajero($objPasajero)
    {
        $resultado=false;
        $arrayPasajero = $this->getPasajeros();
        //Valido si hay cupo disponible
        if($this->hayPasajesDisponibles()){
            $resultado=false;
        }
        //Valido si el pasajero ya esta cargado
        if(!$this->existePasajero($objPasajero)){
            $resultado=false;
        }
        //Agrego al pasajero
        array_push($arrayPasajero,$objPasajero);
        $this->setPasajeros($arrayPasajero);
        $resultado=true;
        return $resultado;  
    }
//Metodo que calcula el costo del pasajero
    public function calcularCostoPasajero($objPasajero)
    {
        $resultado = 0;
        $costoViaje = $this->getCosto();
        $costoPasajero = $objPasajero->darPorcentajeIncremento();
        $resultado = $costoViaje * $costoPasajero;
        return $resultado;
    }
//Vender pasaje
public function venderPasaje($objPasajero){
    $this->agregarPasajero($objPasajero);
    //calculo el costo del pasaje
    $costoPasaje=$this->calcularCostoPasajero($objPasajero);
    //Sumo el costo del pasaje al costo abonado
    $this->setCostoAbonado($this->getCostoAbonado()+$costoPasaje);
    return $costoPasaje;
}

//Muetro la lista de pasajeros con sus datos
public function mostrarListaPasajeros(){

    $mensaje="Lista de Pasajeros Cargados: \n";
    $listaPasajero=$this->getPasajeros();
    if($listaPasajero==null){
       $mensaje= "No hay pasajeros cargados";
    }else{
        
    foreach($this->getPasajeros() as $pasajero){
        $mensaje.= "Nombre: ".$pasajero->getNombre()." DNI: ".$pasajero->getDni()." Costo: ".$this->calcularCostoPasajero($pasajero)."\n";
    }

    }
    return $mensaje;
}
//metodo toString
public function __toString()
{
    return "Codigo: ".$this->getCodigo()."\n 
    Destino: ".$this->getDestino()."\n
    Cantidad Maxima de Pasajeros: ".$this->getCanMaxPasajeros()."\n
    Costo: ".$this->getCosto()." Costo Abonado: ".$this->getCostoAbonado()."\n
    Responsable: ".$this->getResponsable()."\n
    Pasajeros: ".$this->mostrarListaPasajeros()."\n";

}
}