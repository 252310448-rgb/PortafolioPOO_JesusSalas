<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Captura de Inventario</title>
</head>
<body>
    <h2>Registro de Productos - Tienda en Línea</h2>
    <form action="procesar.php" method="POST">
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>#</th>
                <th>Nombre del Producto</th>
                <th>Precio ($)</th>
            </tr>
            <?php for($i = 1; $i <= 5; $i++): ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><input type="text" name="productos[]" required placeholder="Ej. Monitor"></td>
                <td><input type="number" name="precios[]" step="0.01" min="0" required placeholder="0.00"></td>
            </tr>
            <?php endfor; ?>
        </table>
        <br>
        <button type="submit">Calcular y Procesar Inventario</button>
    </form>
</body>
</html>