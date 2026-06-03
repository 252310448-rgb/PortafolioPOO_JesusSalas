<?php
// Configuración y variables inciales
$archivo = 'bitacora.txt';
$mensaje_exito = "";
$mensaje_error = "";

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Limpiamos un poco los espacios en blanco para que no nos hagan trampa
    $fecha = isset($_POST['fecha']) ? trim($_POST['fecha']) : '';
    $actividad = isset($_POST['actividad']) ? trim($_POST['actividad']) : '';
    $responsable = isset($_POST['responsable']) ? trim($_POST['responsable']) : '';

    // Validamos que no haya campos vacíos
    if (empty($fecha) || empty($actividad) || empty($responsable)) {
        $mensaje_error = "¡Oye! Todos los campos son obligatorios. No dejes nada vacío.";
    } else {
        // Formateamos el texto exactamente como lo pide la actividad
        // Agregamos un salto de línea al final de cada bloque para separarlos bien
        $bloque_texto = "Fecha: " . $fecha . "\n" .
                        "Actividad: " . $actividad . "\n" .
                        "Responsable: " . $responsable . "\n" .
                        "-------------------------------\n";

        // Guardamos en el archivo usando FILE_APPEND para no borrar lo anterior
        if (file_put_contents($archivo, $bloque_texto, FILE_APPEND) !== false) {
            $mensaje_exito = "¡Listo! La actividad se registró correctamente en la bitácora.";
        } else {
            $mensaje_error = "Hubo un problema al intentar escribir en el archivo.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Bitácoras</title>
    <style>
        body { font-family: sans-serif; margin: 30px; background-color: #f4f4f4; }
        .contenedor { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 600px; }
        .campo { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; }
        input[type="text"], input[type="date"], textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        button { background: #28a745; color: white; padding: 10px 15px; border: none; border-radius: 3px; cursor: pointer; }
        button:hover { background: #218838; }
        .error { color: red; font-weight: bold; }
        .exito { color: green; font-weight: bold; }
        pre { background: #eee; padding: 10px; border-left: 5px solid #007bff; font-family: monospace; }
    </style>
</head>
<body>

<div class="contenedor">
    <h2>Registro de Actividades Diarias</h2>

    <?php if (!empty($mensaje_error)): ?>
        <p class="error"><?php echo $mensaje_error; ?></p>
    <?php endif; ?>
    
    <?php if (!empty($mensaje_exito)): ?>
        <p class="exito"><?php echo $mensaje_exito; ?></p>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <div class="campo">
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha">
        </div>
        
        <div class="campo">
            <label for="actividad">Descripción de la actividad:</label>
            <textarea id="actividad" name="actividad" rows="3"></textarea>
        </div>
        
        <div class="campo">
            <label for="responsable">Responsable:</label>
            <input type="text" id="responsable" name="responsable">
        </div>
        
        <button type="submit">Guardar Actividad</button>
    </form>

    <hr style="margin: 30px 0;">

    <h2>Bitácora Registrada</h2>
    <?php
    if (file_exists($archivo) && filesize($archivo) > 0) {
        // Leemos todo el contenido del tirón
        $contenido = file_get_contents($archivo);
        
        // Lo mostramos dentro de una etiqueta <pre> para que respete los saltos de línea
        echo "<pre>" . htmlspecialchars($contenido) . "</pre>";
    } else {
        echo "<p><em>La bitácora está vacía por ahora. ¡Sé el primero en registrar algo!</em></p>";
    }
    ?>
</div>

</body>
</html>