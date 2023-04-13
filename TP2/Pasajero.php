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

    //Cargamos en un array los pasajeros
    public function registrarPasajeros($pasajeros){
        //Verificamos que la cantidad de pasajeros no supere el limite de nuestra capacidad maxima
        //Hacemos la sumatoria del contenido del array con la informacion de la variable que contiene al nuevo pasajero, si la sumatoria
        //supera la cantidad de max de pasajeros que determinamos nos mostrara un mensaje y no registrara al pasajero
        //print_r($this->pasajeros);
    if((count($this->pasajeros)+1)>$this->cantMaxPasajeros){
        $mensaje="No es posible agregar mas pasajeros en este viaje. Llego al límite de pasajeros ".$this->cantMaxPasajeros."\n"; 
        }else{
            if (in_array($pasajeros['nroDoc'],array_column($this->pasajeros, 'nroDoc'))) {
                $mensaje="No es posible agregar este Pasajero. El mismo ya se encuentra registrado\n"; 
            }else{
                        //Agregamos al pasajero nuevo a nuestro array
                        array_push($this->pasajeros, $pasajeros);
                        $mensaje="Se agrego el Pasajero \n";
            }
        }
        return $mensaje;
    }

    //Vemos Listado de Pasajeros que tenemos registrados
    public function verPasajerosRegistrados(){
        $mensaje="Registro de Pasajeros:\n";
        $i=0;
        foreach($this->pasajeros as $pasajero){
            $i++;
            $mensaje.= $i." - ".$pasajero['nombre']." ".$pasajero['apellido']." DNI: ".$pasajero['nroDoc']."\n";
        }
        return $mensaje;
    }

    //Modificacion de pasajero
    public function modificarPasajero($nroDoc, $nuevoNombre, $nuevoApellido){
        //Llamo mi arreglo actual para iniciar la busqueda
        $pasajeros=$this->pasajeros;
        //Busco pasajaro con un foreach -- Se utiliza el & para indicarle al bucle que la variable pasajero se la esta pasando como referencia.
        //lo que significa que cualquier cambio que se haga en $pasajero dentro del bucle también afectará al arreglo $pasajeros original. 
        foreach($pasajeros as &$pasajero){
            if($pasajero['nroDoc']===$nroDoc){
                //Modificamos los datos del pasajero
                $pasajero['nombre']=$nuevoNombre;
                $pasajero['apellido']=$nuevoApellido;

                //Actualizamos el arreglo de pasajeros con la nueva informacion del pasajero modificado
                $this->setPasajeros($pasajeros);
                //Avisamos con un mensaje que el pasajero fue actualizado
                $mensaje="El pasajero con DNI: ".$nroDoc." fue modificado correctamente. \n";
            }else{
                $mensaje="El pasajero con DNI: ".$nroDoc." no se encuentra registrado. \n";
            }

        }
        return $mensaje;
    }
    //Eliminar pasajero
    public function eliminarPasajero($nroDoc)
    {
        //Llamo mi arreglo actual para iniciar la busqueda
        $pasajeros = $this->pasajeros;
        //Busco pasajaro con un foreach -- Se utiliza el & para indicarle al bucle que la variable pasajero se la esta pasando como referencia.
        //lo que significa que cualquier cambio que se haga en $pasajero dentro del bucle también afectará al arreglo $pasajeros original. 
        foreach ($pasajeros as $clave => $pasajero) {
            if ($pasajero['nroDoc'] === $nroDoc) {
                // Elimino el pasajero del array
                unset($this->pasajeros[$clave]);
                //Avisamos con un mensaje que el pasajero fue eliminado
                $mensaje="El pasajero con DNI: ".$nroDoc." fue eliminado correctamente. \n";
                // Salimos del bucle porque ya encontramos y eliminamos el pasajero
                break;
            }else{
                $mensaje="El pasajero con DNI: ".$nroDoc." no se encuentra registrado. \n";
            }
        }    
        return $mensaje;
    }



}
