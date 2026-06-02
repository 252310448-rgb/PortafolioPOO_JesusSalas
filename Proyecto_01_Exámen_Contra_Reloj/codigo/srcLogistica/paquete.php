<?php
declare(strict_types=1);

namespace Logistica; // Esto lo puse porque el archivo está dentro de src/Logistica 

// Esta es la clase del paquete 
class Paquete {
    // Aquí pongo las variables públicas que nos pidió con sus tipos 
    public string $codigoSeguimiento; 
    public float $pesoKilogramos; 
    public bool $esFragil; // Le puse 'bool' porque en internet vi que 'boolean' completo marca error en PHP 

    // Esta es la variable privada, nadie la puede tocar desde fuera de este archivo 
    private float $costoInterno;
}
?>