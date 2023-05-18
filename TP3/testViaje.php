<?php
require_once "Viaje.php";
require_once "Pasajero.php";
require_once "PasajeroVip.php";
require_once "PasajeroEsp.php";
require_once "ResponsableV.php";
/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/
/**
 * 
 *  Mostrar Menu de opciones
 * 
 * */
function mostrarMenu()
{
    echo "\n
    1)Ingresar Codigo de Viaje \n
    2)Ingresar Destino de Viaje \n
    3)Ingresar Max de Pasajeros \n
    4)Ingresar Pasajero \n
    5)Modificar Pasajero \n
    6)Eliminar Pasajero \n
    7)Agregar responsable de Viaje \n
    8)Ver Información de Viaje Cargado \n
    9)Salir\n
    Ingrese la opción: ";
}
#-----------------------------
/* Creamos una funcion con el pedido basico de los datos de los pasajeros */
function datosPasajerosBase(){
    echo "Ingrese al pasajero para el viaje \n";
    echo "Nombre del pasajero: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido del pasajero: \n";
    $apellido = trim(fgets(STDIN));
    echo "Nro de DNI: \n";
    $nroDni = trim(fgets(STDIN));
    echo "Nro de Tel: \n";
    $nroTel = trim(fgets(STDIN));
    echo "Nro Asiento: \n";
    $nroAsiento = trim(fgets(STDIN));
    $datosBasicos = [$nombre, $apellido,$nroDni, $nroTel, $nroAsiento];
   return $datosBasicos;
}

/**
 * Agregar un pasajero al viaje
 * @param Viaje $viaje
 */
function agregarPasajero($viaje){
    echo "Ingrese el tipo de viajero: \n
    Seleccione la opción \n
     1) Venta Normal \n
     2) Venta VIP \n
     3) Venta para personas con Discapacidad \n";
     $respuesta=trim(fgets((STDIN)));
    $pasajero=null;
    //Realizamos un switch case para cada tipo de pasajero
    switch($respuesta){
        case 1:
            $pedirDatosBasicos=datosPasajerosBase();
            $pasajero=new Pasajero(...$pedirDatosBasicos);
            break;
        case 2:
            $pedirDatosBasicos=datosPasajerosBase();
            echo "Nro de Pasajero Frecuente: \n";
            $nroFrecuente = trim(fgets(STDIN));
            echo "Cantidad de Millas: \n";
            $millas = trim(fgets(STDIN));
            $pasajero=new PasajeroVip(...$pedirDatosBasicos,$nroFrecuente,$millas);
            break;
        case 3:

            $pedirDatosBasicos=datosPasajerosBase();
            echo "Requiere silla: s/n \n";
            $silla = trim(fgets(STDIN));
            $silla = ($silla == 's') ? true : false;
            echo "Requiere asistencia: s/n \n";
            $asistencia = trim(fgets(STDIN));
            $asistencia = ($asistencia == 's') ? true : false;
            echo "Requiere comida especial: s/n \n";
            $comida = trim(fgets(STDIN));
            $comida = ($comida == 's') ? true : false;
            $pasajero=new PasajeroEsp(...$pedirDatosBasicos,$silla,$asistencia,$comida);
            break;
            default:
                echo "Opcion incorrecta \n";
            break;
    }
$costoApagar=$viaje->venderPasaje($pasajero);
echo "El costo a pagar es: $costoApagar \n";
echo "El pasajero se agrego correctamente \n";
echo $pasajero;

}

///////////////////Responsable
/* Creamos una funcion con el pedido basico de los datos de los pasajeros */
function datosResponsable(){
    echo "Ingrese al pasajero para el viaje \n";
    echo "Nombre del pasajero: \n";
    $nombre = trim(fgets(STDIN));
    echo "Apellido del pasajero: \n";
    $apellido = trim(fgets(STDIN));
    echo "Nro de Empleado: \n";
    $nroEmp = trim(fgets(STDIN));
    echo "Nro de Lic: \n";
    $nroLic= trim(fgets(STDIN));
    $datosBasicos = [$nombre, $apellido,$nroEmp, $nroLic];
   return $datosBasicos;
}
 function insertarResponable()
    {
        $datos=datosResponsable();
        $ingresarResponsable = new ResponsableV(...$datos);
        return true;
    }

//////////FIN responsable




/**************************************/
/***** PROGRAMA PRINCIPAL ********/
/**************************************/
//Iniciamos el programa
//Llamamos a la clase y le daremos datos iniciales
//Cargamos el array con dato


$viaje = new Viaje("1", "Buenos Aires", 15,3500);
$pasajero=new Pasajero("Pedro", "Guzman", 36459126, 299269357, 15);
$pasajeroVIP= new PasajeroVIP( "Emanuel","Vazquez",36621147, 44718236, 12, 360, 15000);
$pasajeroEspecial= new PasajeroEsp("Samuel","Lorenzo", 40123654, 44901889, 10, false, true, false);
$responsable= new ResponsableV("I1", "3695", "Samanta", "Gutierrez");

$costoFinalPasajero1 = $viaje->venderPasaje($pasajero);
$costoFinalPasajero1 = $viaje->venderPasaje($pasajeroVIP);
$costoFinalPasajero2 = $viaje->venderPasaje($pasajeroEspecial);

do {

    //mostramos el menu con las opciones a elegir
    mostrarMenu();
    //leemos la opcion
    $opcion = trim((fgets(STDIN)));

    //Creamos un switch para darle acceso a las opciones del menu
    switch ($opcion) {
        case 1:
            //Ingresamos el codigo de viaje
            echo "Ingrese un codigo para identificar el viaje \n";
            $codigo = trim(fgets(STDIN));
            $viaje->setCodigo($codigo);
            break;
        case 2:
            //Ingresamos el Destino de viaje
            echo "Ingrese un Destino para  el viaje \n ";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            break;
        case 3:
            //Indicamos la cantidad Max de pasajeros
            echo "Ingrese un limite de pasajeros para el viaje \n ";
            $maxPasajeros = trim(fgets(STDIN));
            $viaje->setCanMaxPasajeros($maxPasajeros);

            break;
        case 4:
            //Ingresamos los Pasajeros
            agregarPasajero($viaje);

            break;

        case 6:
            ingresarResponsable();
            break;

        case 7:
            //Ver Información de Viaje Cargado
            echo $viaje;
            break;

        case 8:
            //Salir
            echo "Finalizo la carga del viaje";
            exit();
            break;
        default:
            echo "No es una opción correcta. Intente nuevamente";
            break;
    }
} while ($opcion !=8);
