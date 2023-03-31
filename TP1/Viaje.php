<?php
/*
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. 
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase
(incluso los datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. 
Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
 */

//Creamos la clase
class Viaje{
    //Declaracion de los atributos
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajeros=[];

    //Constructor de la clase
    public function __construct($codigo, $destino, $cantMaxPasajeros, $pasajeros)
    {
        $this->codigo=$codigo;
        $this->destino=$destino;
        $this->cantMaxPasajeros=$cantMaxPasajeros;
        $this->pasajeros=$pasajeros;   

        echo $this->codigo;
    }

    //Declaracion de los Metodos

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


    //Metodos Getter y Setter
    public function getCodigo(){
        return $this->codigo;
    }
    public function setCodigo($codigo){
        $this->codigo=$codigo;
    }
 public function getDestino(){
        return $this->destino;
    }
    public function setDestino($destino){
        $this->destino=$destino;
    }
    public function getCanMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function setCanMaxPasajeros($cantMaxPasajeros){
        $this->cantMaxPasajeros=$cantMaxPasajeros;
    }
    public function getPasajeros(){
        return $this->pasajeros;
    }
    public function setPasajeros($pasajeros){
        $this->pasajeros=$pasajeros;
    }

    public function __toString(){
        //Mostramos la informacion que cargamos en nuestro sistema de viaje
        $mensaje="********** Información Viaje Feliz **********\n";
        $mensaje.= "CODIGO: ".$this->getCodigo() ."\n";
      $mensaje.= "DESTINO: ".$this->getDestino() ."\n";
        $mensaje.= "PASAJEROS CANT. MAX: ".$this->getCanMaxPasajeros() ."\n";
        $mensaje.= "PASAJEROS REGISTRADOS: ". count($this->pasajeros) ."\n";

        $mensaje.=$this->verPasajerosRegistrados();

        $mensaje.="\n";

        return $mensaje;
    }
}

?>