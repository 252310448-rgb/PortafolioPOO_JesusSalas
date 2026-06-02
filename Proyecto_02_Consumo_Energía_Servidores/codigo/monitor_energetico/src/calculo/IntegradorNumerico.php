<?php

namespace App\Calculo;

use Exception;

class IntegradorNumerico {

    private float $inicio;
    private float $fin;
    private int $pasos;

    public function __construct(float $a, float $b, int $n = 1000) {

        if ($a >= $b) {
            throw new Exception("El tiempo inicial debe ser menor al final.");
        }

        if ($n <= 0) {
            throw new Exception("La precisión debe ser mayor a 0.");
        }

        $this->inicio = $a;
        $this->fin = $b;
        $this->pasos = $n;
    }

    private function funcionPotencia(float $t): float {
        return pow($t, 2) + (2 * $t);
    }

    public function calcularEnergiaTotal(): float {

        $h = ($this->fin - $this->inicio) / $this->pasos;

        $suma = ($this->funcionPotencia($this->inicio) + $this->funcionPotencia($this->fin)) / 2;

        for ($i = 1; $i < $this->pasos; $i++) {
            $t = $this->inicio + $i * $h;
            $suma += $this->funcionPotencia($t);
        }

        return $suma * $h;
    }
}