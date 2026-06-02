<?php
// Iniciamos la sesión para poder pasar los resultados al otro archivo
session_start();
// Recibe los arreglos paralelos desde el formulario
$productos = $_POST['productos']; 
$precios = $_POST['precios'];     
// Hace los cálculos solicitados con las funciones de PHP 
$totalVenta = array_sum($precios); 
$totalElementos = count($precios); 
$promedioPrecios = $totalVenta / $totalElementos; 
$precioMaximo = max($precios); 
$precioMinimo = min($precios); 
// Busca los nombres correspondientes usando el índice
$indiceCaro = array_search($precioMaximo, $precios);
$productoMasCaro = $productos[$indiceCaro];
$indiceBarato = array_search($precioMinimo, $precios);
$productoMasBarato = $productos[$indiceBarato];
// Guardar todo dentro de la variable global $_SESSION
$_SESSION['lista_productos'] = $productos;
$_SESSION['lista_precios']   = $precios;
$_SESSION['total']           = $totalVenta;
$_SESSION['promedio']        = $promedioPrecios;
$_SESSION['pro_caro']        = $productoMasCaro;
$_SESSION['precio_caro']     = $precioMaximo;
$_SESSION['pro_barato']      = $productoMasBarato;
$_SESSION['precio_barato']   = $precioMinimo;

// Redirige automáticamente a resultados.php
header("Location: resultados.php");
exit();
?>