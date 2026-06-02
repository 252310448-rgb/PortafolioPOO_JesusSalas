# Examen Práctico Contra Reloj - Corte 1

## 1. Nombre del proyecto
Examen Práctico Contra Reloj - Corte 1

## 2. Objetivo del proyecto
El objetivo de esta práctica es medir qué tan rápidos y precisos somos con la sintaxis de PHP. El reto era modelar datos usando clases, tipos estrictos y visibilidad de variables en media hora, sin meter nada de métodos.

## 3. Problema que resuelve
El sistema resuelve dos problemas de organización de datos sin usar bases de datos:
* **FastDelivery:** Creación de un molde para guardar los datos de los paquetes (código, peso, si es frágil) cuidando que el costo interno no se pueda modificar por fuera.
* **Monitoreo de plantas:** Controlar los datos de los sensores de las plantas (id, marca, rango máximo) y registrar el momento exacto de la lectura usando la fecha del sistema.

## 4. Tecnologías utilizadas
* PHP
* XAMPP (Servidor local Apache)
* Git y GitHub

## 5. Conceptos aplicados (según temario)
* **Clases y Objetos:** Creación de las estructuras de `Paquete` y `Sensor`, e instanciación de los objetos independientes (`$paqueteA`, `$paqueteB`, `$sensor`) usando `new`.
* **Visibilidad (Encapsulamiento):** Uso de variables `public` para acceso libre y `private` para proteger datos sensibles como `costoInterno`.
* **Tipado estricto y objetos nativos:** Obligar a las propiedades a recibir un solo tipo de dato (`string`, `float`, `int`, `bool`) y el uso de la clase predefinida `DateTime` para la hora del sensor.

## 6. Capturas de pantalla
### Código fuente:
![Código del sistema](capturas/codigo.png)
![Código del sistema](capturas/codigo2.png)

### Ejecución del programa en el navegador:
![Pantalla del sistema](capturas/ejecucion.png)

## 7. Instrucciones de ejecución
1. Mover la carpeta del proyecto a la ruta `C:/xampp/htdocs/`.
2. Abrir el panel de XAMPP y activar el módulo de **Apache**.
3. En el navegador web, ingresar a la dirección: `http://localhost/[Nombre_De_Tu_Carpeta]/index.php` (revisando que el index esté en la raíz).

## 8. Reflexión personal
* **¿Qué aprendí?:** Aprendí a estructurar las clases en carpetas separadas (`src/Logistica`) y a usar el tipado estricto en