<?php
class Pasajero {
    protected $nombre;
    protected $numAsiento;
    protected $numTicket;

    function __construct($nombre, $numAsiento, $numTicket) {
        $this->nombre = $nombre;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }

    function darPorcentajeIncremento() {
        return 10; // Porcentaje de incremento por defecto para pasajeros estándares
    }

    function getNombre() {
        return $this->nombre;
    }

    function getNumAsiento() {
        return $this->numAsiento;
    }

    function getNumTicket() {
        return $this->numTicket;
    }
}

class PasajeroVIP extends Pasajero {
    protected $numViajeroFrecuente;
    protected $cantidadMillas;

    function __construct($nombre, $numAsiento, $numTicket, $numViajeroFrecuente, $cantidadMillas) {
        parent::__construct($nombre, $numAsiento, $numTicket);
        $this->numViajeroFrecuente = $numViajeroFrecuente;
        $this->cantidadMillas = $cantidadMillas;
    }

    function darPorcentajeIncremento() {
        $incremento = 35; // Porcentaje de incremento para pasajeros VIP
        if ($this->cantidadMillas > 300) {
            $incremento += 30; // Incremento adicional si la cantidad de millas es mayor a 300
        }
        return $incremento;
    }
}

class PasajeroNecesidadesEspeciales extends Pasajero {
    protected $sillaRuedas;
    protected $asistenciaEmbarque;
    protected $asistenciaDesembarque;
    protected $comidaEspecial;

    function __construct($nombre, $numAsiento, $numTicket, $sillaRuedas, $asistenciaEmbarque, $asistenciaDesembarque, $comidaEspecial) {
        parent::__construct($nombre, $numAsiento, $numTicket);
$this->sillaRuedas = $sillaRuedas;
$this->asistenciaEmbarque = $asistenciaEmbarque;
$this->asistenciaDesembarque = $asistenciaDesembarque;
$this->comidaEspecial = $comidaEspecial;
}

function darPorcentajeIncremento() {
    if ($this->sillaRuedas && $this->asistenciaEmbarque && $this->asistenciaDesembarque && $this->comidaEspecial) {
        return 30; // Incremento del 30% si requiere todos los servicios especiales
    } elseif ($this->sillaRuedas || $this->asistenciaEmbarque || $this->asistenciaDesembarque || $this->comidaEspecial) {
        return 15; // Incremento del 15% si requiere al menos uno de los servicios especiales
    } else {
        return 10; // Incremento del 10% por defecto para pasajeros con necesidades especiales
    }
}
}

class Viaje {
private $costoViaje;
private $costoAbonado;
private $pasajeros;
private $maxPasajeros;
function __construct($costoViaje, $maxPasajeros) {
    $this->costoViaje = $costoViaje;
    $this->costoAbonado = 0;
    $this->pasajeros = array();
    $this->maxPasajeros = $maxPasajeros;
}

function venderPasaje($objPasajero) {
    if ($this->hayPasajesDisponible()) {
        $this->pasajeros[] = $objPasajero;
        $this->costoAbonado += $this->calcularCostoFinal($objPasajero);
        return $this->costoViaje - $this->costoAbonado;
    } else {
        return 0; // No hay espacio disponible para vender pasajes
    }
}

function hayPasajesDisponible() {
    return count($this->pasajeros) < $this->maxPasajeros;
}

private function calcularCostoFinal($objPasajero) {
    $porcentajeIncremento = $objPasajero->darPorcentajeIncremento() / 100;
    return $this->costoViaje * $porcentajeIncremento;
}
}
/*
Con este código, hemos creado las clases "Pasajero", "PasajeroVIP" y "PasajeroNecesidadesEspeciales" que heredan de la clase base "Pasajero". Luego, hemos implementado la clase "Viaje" que almacena el costo del viaje, la suma de los costos abonados y la colección de pasajeros. Además, hemos agregado los métodos necesarios para vender pasajes y verificar la disponibilidad de pasajes.

Ahora puedes crear objetos de las clases y probar el funcionamiento del código. Por ejemplo:

```php*/
$viaje = new Viaje(1000, 50);

$pasajero1 = new Pasajero("Juan", 1, "123456");
$pasajero2 = new PasajeroVIP("Maria", 2, "789012", "F123", 400);
$pasajero3 = new PasajeroNecesidadesEspeciales("Pedro", 3, "345678", true, true, false, true);

$costoFinalPasajero1 = $viaje->venderPasaje($pasajero1);
$costoFinalPasajero2 = $viaje->venderPasaje($pasajero2);
$costoFinalPasajero3 = $viaje->venderPasaje($pasajero3);

echo "Costo final para el pasajero 1: $" . $costoFinalPasajero1 . "\n";
echo "Costo final para el pasajero 2: $" . $costoFinalPasajero2 . "\n";
echo "Costo final para el pasajero 3: $" . $costoFinalPasajero3 . "\n";


