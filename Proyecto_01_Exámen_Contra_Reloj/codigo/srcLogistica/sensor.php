<?php
declare(strict_types=1);

// Segunda clase del examen 
class Sensor {
    // Estas son las características del sensor que venían en la hoja 
    public int $id;
    public string $marca;
    public \DateTime $ultimaLectura; // Puse \DateTime porque es una clase que ya trae PHP 
    public float $rangoMaximo; 
}
?>