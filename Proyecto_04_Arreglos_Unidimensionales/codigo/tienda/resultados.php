<?php
// Iniciamos sesión para poder leer los datos guardados
session_start();
// Validamos por si acaso alguien intenta entrar a esta página directamente sin llenar el formulario
if (!isset($_SESSION['lista_productos'])) {
    echo "No hay datos para mostrar. Por favor, regresa al formulario.";
    echo "<br><a href='index.php'>Ir al formulario</a>";
    exit();
}
// Recuperamos las variables de la sesión para usarlas más fácil en el HTML
$productos = $_SESSION['lista_productos'];
$precios   = $_SESSION['lista_precios'];
$totalVenta = $_SESSION['total'];
$promedioPrecios = $_SESSION['promedio'];
$productoMasCaro = $_SESSION['pro_caro'];
$precioMaximo = $_SESSION['precio_caro'];
$productoMasBarato = $_SESSION['pro_barato'];
$precioMinimo = $_SESSION['precio_barato'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados del Inventario</title>
</head>
<body>
    <h2>Reporte Final de Inventario (Resultados)</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr bgcolor="#dddddd">
            <th>Producto</th>
            <th>Precio</th>
        </tr>
        <?php 
        // Recorremos los arreglos usando el foreach
        foreach ($productos as $indice => $nomProducto) {
            echo "<tr>";
                echo "<td>" . $nomProducto . "</td>";
                echo "<td>$" . number_format($precios[$indice], 2) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <h3>Resumen de Análisis Financiero:</h3>
    <ul>
        <li><b>Total de la venta potencial:</b> $<?php echo number_format($totalVenta, 2); ?></li>
        <li><b>Promedio de precios:</b> $<?php echo number_format($promedioPrecios, 2); ?></li>
        <li><b>Producto más caro:</b> <?php echo $productoMasCaro; ?> ($<?php echo number_format($precioMaximo, 2); ?>)</li>
        <li><b>Producto más barato:</b> <?php echo $productoMasBarato; ?> ($<?php echo number_format($precioMinimo, 2); ?>)</li>
    </ul>
    <p><a href="index.php">Registrar nuevos productos</a></p>
</body>
</html>