<?php

require_once __DIR__ . '/src/Calculo/IntegradorNumerico.php';

use App\Calculo\IntegradorNumerico;

$resultado = null;
$kwh = null;
$error = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {

        $integrador = new IntegradorNumerico(
            (float) $_POST['t_inicio'],
            (float) $_POST['t_fin'],
            (int) $_POST['precision']
        );

        $resultado = $integrador->calcularEnergiaTotal();
        $kwh = $resultado * 2.7778e-7;

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Monitor Energético</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<div class="container">

<h1>⚡ Monitor Energético</h1>

<form method="POST">

<label>Tiempo inicio</label>
<input type="number" name="t_inicio" step="0.1" required>

<label>Tiempo fin</label>
<input type="number" name="t_fin" step="0.1" required>

<label>Precisión</label>
<input type="number" name="precision" value="1000" required>

<button type="submit">Calcular</button>

</form>

<?php if ($resultado !== null): ?>
<div class="result">
    <h3>Resultado: <?php echo number_format($resultado, 4); ?> Joules</h3>
    <h3>kWh: <?php echo number_format($kwh, 10); ?></h3>
</div>
<?php endif; ?>

<?php if ($error): ?>
<div class="error">
    <?php echo $error; ?>
</div>
<?php endif; ?>

<hr>

<h3>Tabla comparativa</h3>

<table border="1">
<tr>
    <th>n</th>
    <th>Resultado</th>
</tr>

<tr>
    <td>10</td>
    <td><?php echo number_format((new IntegradorNumerico(0,10,10))->calcularEnergiaTotal(),2); ?></td>
</tr>

<tr>
    <td>100</td>
    <td><?php echo number_format((new IntegradorNumerico(0,10,100))->calcularEnergiaTotal(),2); ?></td>
</tr>

<tr>
    <td>1000</td>
    <td><?php echo number_format((new IntegradorNumerico(0,10,1000))->calcularEnergiaTotal(),2); ?></td>
</tr>

</table>

</div>

</body>
</html>