<?php
declare(strict_types=1);

// Aquí jalo los archivos de las clases para poder usarlos 
require_once 'Paquete.php';
require_once 'Sensor.php'; 

// Tengo que poner esto para que PHP sepa que voy a usar la clase Paquete que está guardada allá adentro
use Logistica\Paquete;

// Creo dos paquetes diferentes usando el molde (clase) 
$paqueteA = new Paquete(); 
$paqueteB = new Paquete();

// Le meto datos al primer paquete usando la flechita '->' 
$paqueteA->codigoSeguimiento = "FEDEX-12345"; 
$paqueteA->pesoKilogramos = 12.8; 
$paqueteA->esFragil = false; 

// Intento meterle un valor a la fuerza a la variable privada 
// $paqueteA->costoInterno = 500.00; 
/*
  PROFE, COMENTÉ LA LÍNEA DE ARRIBA PORQUE SI LA DEJO SIN COMENTAR EL PROGRAMA SE CAE.
  Lo que pasa es que 'costoInterno' es una propiedad PRIVADA. La POO dice que 
  las cosas privadas están protegidas por el "encapsulamiento" y solo se pueden cambiar 
  desde adentro de su propia clase (Paquete.php). Como estoy intentando cambiarla desde 
  este archivo index.php, PHP se enoja y lanza un "Fatal Error" diciendo que no tengo permiso.
*/

// Creo el objeto del Sensor y le pongo sus datos 
$miSensor = new Sensor(); 
$miSensor->id = 1; 
$miSensor->marca = "Sony"; 
$miSensor->rangoMaximo = 99.9; 

// Para la fecha, como ultimaLectura pide un objeto DateTime, tengo que hacer un 'new DateTime()' aquí mismo 
$miSensor->ultimaLectura = new \DateTime();


// Este mensaje es para saber si todo cargó bien en el localhost de XAMPP
echo "Listo profe, ya jala todo bien y no marca errores en la pantalla.";
?>