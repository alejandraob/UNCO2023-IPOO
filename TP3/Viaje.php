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
    private $valorPasaje;
    private $costoAbonado;


    //Constructor de la clase
    public function __construct($codigo, $destino, $cantMaxPasajeros, $valorPasaje)
    {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->cantMaxPasajeros = $cantMaxPasajeros;
        $this->responsable = [];
        $this->pasajeros = [];
        $this->valorPasaje=$valorPasaje;
        $this->costoAbonado=0;
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

    public function getValorPasaje(){
        return $this->valorPasaje;
    }
    
    public function setValorPasaje($valorPasaje){
        $this->valorPasaje = $valorPasaje;
    }
    
    public function getCostoAbonado(){
        return $this->costoAbonado;
    }
    
    public function setCostoAbonado($costoAbonado){
        $this->costoAbonado = $costoAbonado;
    }

    ///////////////Metodos para pasajero
    public function insertarPasajero($nombre, $apellido, $nroDni, $nroTel,$nroTicket, $nroAsiento,$nroViajeroFrecuente, $cantidadMilla, $requiereSilla, $requiereAsistencia, $requiereComidaEspecial )
    {
        if($nroViajeroFrecuente==null && $cantidadMilla==null && $requiereSilla==null && $requiereAsistencia==null && $requiereComidaEspecial==null){
            $pasajeroAIngresar = new Pasajero($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento);
            $i = 0;
            $longitud = count($this->getPasajeros());

            if($longitud<$this->getCanMaxPasajeros()){
            while ($i < $longitud) {
                if ($pasajeroAIngresar->getNroDni() == $this->getPasajeros()[$i]->getNroDni()) {

                    return false;
                }
                $i++;
            }
            $pasajeroAIngresar->setNombre($nombre);
            $pasajeroAIngresar->setApellido($apellido);
            $pasajeroAIngresar->setNroDni($nroDni);
            $pasajeroAIngresar->setNroTel($nroTel);
            $pasajeroAIngresar->setNroTicket($nroTicket);
            $pasajeroAIngresar->setNroAsiento($nroAsiento);
            $arreglo = $this->getPasajeros();
            array_push($arreglo, $pasajeroAIngresar);
            $this->setPasajeros($arreglo);
            }else{
                return 2;
            }
            return true;
        }
        if($requiereSilla==null && $requiereAsistencia==null && $requiereComidaEspecial==null){
         $pasajeroAIngresarVIP = new PasajeroVIP($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento,$nroViajeroFrecuente, $cantidadMilla);
            $i = 0;
            $longitud = count($this->getPasajeros());
    
            if($longitud<$this->getCanMaxPasajeros()){
            while ($i < $longitud) {
                if ($pasajeroAIngresarVIP->getNroDni() == $this->getPasajeros()[$i]->getNroDni()) {
    
                    return false;
                }
                $i++;
            }
            $pasajeroAIngresarVIP->setNombre($nombre);
            $pasajeroAIngresarVIP->setApellido($apellido);
            $pasajeroAIngresarVIP->setNroDni($nroDni);
            $pasajeroAIngresarVIP->setNroTel($nroTel);
            $pasajeroAIngresarVIP->setNroTicket($nroTicket);
            $pasajeroAIngresarVIP->setNroAsiento($nroAsiento);
            $arreglo = $this->getPasajeros();
            array_push($arreglo, $pasajeroAIngresarVIP);
            $this->setPasajeros($arreglo);
            }else{
                return 2;
            }
            return true;
        
        
        }
        if($cantidadMilla==null &&  $requiereSilla==null){
         $pasajeroAIngresarESP = new PasajeroEsp($nombre, $apellido, $nroDni, $nroTel, $nroTicket, $nroAsiento, $requiereSilla, $requiereAsistencia, $requiereComidaEspecial);
        $i = 0;
        $longitud = count($this->getPasajeros());

        if($longitud<$this->getCanMaxPasajeros()){
        while ($i < $longitud) {
            if ($pasajeroAIngresarESP->getNroDni() == $this->getPasajeros()[$i]->getNroDni()) {

                return false;
            }
            $i++;
        }
        $pasajeroAIngresarESP->setNombre($nombre);
        $pasajeroAIngresarESP->setApellido($apellido);
        $pasajeroAIngresarESP->setNroDni($nroDni);
        $pasajeroAIngresarESP->setNroTel($nroTel);
        $pasajeroAIngresarESP->setNroTicket($nroTicket);
        $pasajeroAIngresarESP->setNroAsiento($nroAsiento);
        $arreglo = $this->getPasajeros();
        array_push($arreglo, $pasajeroAIngresarESP);
        $this->setPasajeros($arreglo);
        }else{
            return 2;
        }
        return true;
    }

    }
    public function verPasajerosRegistrados()
    {
        $i = 0;
        $mensaje = "";
        foreach ($this->getPasajeros() as $pasajero) {
            $i++;
            $mensaje .= $i . " - " . $pasajero;
        }
        return $mensaje;
    }

    public function modificarPasajero($nroDni,$nombre, $apellido,  $nroTel)
    {

         $i = 0;
         $corte = false;
        $array_Pasajeros = $this->getPasajeros();
        $longitud = count($this->getPasajeros());

        while ($i < $longitud && !$corte) {
            if ($nroDni === $array_Pasajeros[$i]->getNroDni()) {

                $pasajeroEncontrado =$array_Pasajeros[$i];
                $pasajeroEncontrado->setNombre($nombre);
                $pasajeroEncontrado->setApellido($apellido);
                $pasajeroEncontrado->setNroDni($nroDni);
                $pasajeroEncontrado->setNroTel($nroTel);
               // $this->setPasajeros($array_Pasajeros);
                $corte = true;
            }
            $i++;
        }
        
        $this->setPasajeros($array_Pasajeros);
        return true;
    }

    public function eliminarPasajero($nroDni)
    {
        $i = 0;
        $corte = false;
        $array_Pasajeros = $this->getPasajeros();
        $longitud = count($this->getPasajeros());
        while ($i < $longitud && !$corte) {
            if ($nroDni === $array_Pasajeros[$i]->getNroDni()) {
                unset($array_Pasajeros[$i]);
                $array_Pasajeros = array_values($array_Pasajeros);
                $this->setPasajeros($array_Pasajeros);
                return true;
            }
            $i++;
        }
        return true;
    }
    ///////////////FIN Metodos para pasajero
    ///////////////Metodos para Responsable


    public function insertarResponable($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
        $ingresarResponsable = new ResponsableV($nroEmpleado, $nroLicencia, $nombre, $apellido);
        $ingresarResponsable->setNroEmpleado($nroEmpleado);
        $ingresarResponsable->setNroLicencia($nroLicencia);
        $ingresarResponsable->setNombre($nombre);
        $ingresarResponsable->setApellido($apellido);
        $arreglo = $this->getResponsable();
        array_push($arreglo, $ingresarResponsable);
        $this->setResponsable($arreglo);

        return true;
    }


    public function verResponsableViaje()
    {
        $i=0;
        $mensaje ="";
        foreach ($this->getResponsable() as $responsable) {
            $i++;
            $mensaje .=$responsable;
        }
        return $mensaje;
    }

    public function modificarResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido)
    {
         $i = 0;
         $corte = false;
        $array_Responsable = $this->getResponsable();
        $longitud = count($this->getResponsable());

        while ($i < $longitud && !$corte) {
            if ($nroEmpleado === $array_Responsable[$i]->getNroEmpleado()) {

                $pasajeroEncontrado =$array_Responsable[$i];
                $pasajeroEncontrado->setNombre($nombre);
                $pasajeroEncontrado->setApellido($apellido);
                $pasajeroEncontrado->setNroLicencia($nroLicencia);
                $corte = true;
            }
            $i++;
        }
        
        $this->setResponsable($array_Responsable);
        return true;
    }

    public function eliminarResponsable($nroEmpleado)
    {
        $i = 0;
        $corte = false;
        $array_Responsable = $this->getResponsable();
        $longitud = count($this->getResponsable());
        while ($i < $longitud && !$corte) {
            if ($nroEmpleado === $array_Responsable[$i]->getNroEmpleado()) {
                unset($array_Responsable[$i]);
                $array_Responsable = array_values($array_Responsable);
                $this->setResponsable($array_Responsable);
                return true;
            }
            $i++;
        }
        return true;
    }

/////
/*
public function hayPasajesDisponible() {
    $cantidadMAXPasajeros=$this->getCanMaxPasajeros();
    $totalPasajeros=count($this->pasajeros);
    return $totalPasajeros<$cantidadMAXPasajeros;
}
/*
public function venderPasaje($objPasajero) {
    if ($this->hayPasajesDisponible()) {
        $this->pasajeros[] = $objPasajero;
        $costoViaje = $this->getValorPasaje();
        $valorAbonado = $this->getCostoAbonado();

        $valorAbonado += $this->calcularCostoFinal($objPasajero);
        $this->setCostoAbonado($valorAbonado); // Actualizar el costo abonado
        return $costoViaje - $valorAbonado; // Retornar el costo final que debe ser abonado por el pasajero
    } else {
        return 0; // No hay espacio disponible para vender pasajes
    }
}
*//*
private function calcularCostoFinal($objPasajero) {
    $costoViaje = $this->getValorPasaje(); // Obtener el valor del pasaje
    $porcentajeIncremento = $objPasajero->darPorcentajeIncremento() / 100;

    return $costoViaje * (1 + $porcentajeIncremento); // Calcular el costo final con el porcentaje de incremento
}

public function venderPasaje($objPasajero)
{
    if ($this->hayPasajesDisponible()) {
        $this->pasajeros[] = $objPasajero;
        $costoViaje = $this->getValorPasaje();
        $valorAbonado = $this->getCostoAbonado();

        $costoFinal = $this->calcularCostoFinal($objPasajero);
        $valorAbonado += $costoFinal;
        $this->setCostoAbonado($valorAbonado); // Actualizar el costo abonado

        return $costoFinal; // Retornar el costo final que debe ser abonado por el pasajero
    } else {
        return 0; // No hay espacio disponible para vender pasajes
    }
}
*/
    // Método para verificar si hay pasajes disponibles
    public function hayPasajesDisponibles()
    {
        return count($this->pasajeros) < $this->cantMaxPasajeros;
    }

    // Método para vender un pasaje
    public function venderPasaje($objPasajero)
    {
        if ($this->hayPasajesDisponibles()) {
            $this->pasajeros[] = $objPasajero;
            $this->costoAbonado += $this->valorPasaje;
            return $this->valorPasaje;
        } else {
            return 0; // Si no hay pasajes disponibles, el costo será 0
        }
    }

    // Método para calcular el costo final del viaje
    public function calcularCostoFinal()
    {
        $costoTotal = $this->valorPasaje * count($this->pasajeros);
        return $costoTotal;
    }

    // Método para obtener la lista de pasajeros
    public function obtenerPasajeros()
    {
        return $this->pasajeros;
    }

    // Método para obtener el costo abonado hasta el momento
    public function obtenerCostoAbonado()
    {
        return $this->costoAbonado;
    }


    ///////////////FIN Metodos para pasajero

    public function __toString()
    {
        $codigo=$this->getCodigo();
        $destino=$this->getDestino() ;
        $responsable=$this->getCanMaxPasajeros();
        $maxPasajeros=$this->getCanMaxPasajeros();
        $costoPasaje=$this->getValorPasaje();
        $abonado=$this->getCostoAbonado();
        $totalPasajeros=count($this->pasajeros);

        //Mostramos la informacion que cargamos en nuestro sistema de viaje
        $mensaje = "********** Información Viaje Feliz **********\n";
        $mensaje .= "CODIGO: " .$codigo  . "\n";
        $mensaje .= "DESTINO: " . $destino . "\n";
        $mensaje .= "RESPONSABLE: " .$responsable. "\n";
        $mensaje .= "VALOR PASAJE $: " .$costoPasaje  . "\n";
        $mensaje .= "ABONADO $: " .$abonado. "\n";
        $mensaje .= "PASAJEROS CANT. MAX: " . $maxPasajeros  . "\n";
        $mensaje .= "PASAJEROS REGISTRADOS: " .$totalPasajeros  . "\n";

        $mensaje .= $this->verPasajerosRegistrados();

        $mensaje .= "\n";
      
        return $mensaje;
    }
}
