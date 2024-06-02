<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Amortizacion</title>
    <style>
        /* Estilo para el bot�n */
        button {
            background-color: yellow;
            color: black;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            background-color: skyblue;
            position: center;
        }
    </style>
</head>
<body>
    <h1>Ingrese los Datos</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="monto">Monto del prestamo:</label>
        <input type="number" name="monto" id="monto" step="0.01" required><br><br>
        <label for="periodo">Numero de periodos:</label>
        <input type="number" name="periodo" id="periodo" required><br><br>
        <label for="tasa">Tasa de interes mensual (%):</label>
        <input type="number" name="tasa" id="tasa" step="0.01" required><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $monto = $_POST["monto"];
        $periodo = $_POST["periodo"];
        $tasa = $_POST["tasa"] / 100; // Convertir la tasa de porcentaje a decimal
    
        echo "<h2>Tabla de Amortizaci�n</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Periodo</th><th>Saldo</th><th>Interes</th><th>Abono</th><th>Pago</th></tr>";

        $saldo = $monto; // Inicializar saldo con el monto del pr�stamo
        for ($i = 1; $i <= $periodo; $i++) {
            $interes = $saldo * $tasa;
            $abono = $monto / $periodo;
            $pago = $interes + $abono;
            $saldo -= $monto / $periodo;

            echo "<tr><td>$i</td><td>Q" . number_format($saldo, 2) . "</td><td>Q" . number_format($interes, 2) . "</td><td>Q" . number_format($abono, 2) . "</td><td>Q" . number_format($pago, 2) . "</td></tr>";
        }

        echo "</table>";
    }
    ?>
</body>
</html>