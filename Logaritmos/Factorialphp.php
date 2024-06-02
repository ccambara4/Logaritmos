<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Factorial</title>
</head>
<body>
    <h1>Calculadora de Factorial</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="numero">Ingrese un numero:</label>
        <input type="number" name="numero" id="numero" required>
        <button type="submit">Calcular Factorial</button>
    </form>

    <?php
    function calcularFactorial($numero)
    {
        if ($numero < 0) {
            return "No se puede calcular el factorial de un n�mero negativo.";
        } elseif ($numero == 0) {
            return 1;
        } else {
            $factorial = 1;
            for ($i = 1; $i <= $numero; $i++) {
                $factorial *= $i;
            }
            return $factorial;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $numero = intval($_POST['numero']);
        $resultado = calcularFactorial($numero);
        echo "<p>El factorial de $numero es $resultado.</p>";
    }
    ?>
</body>
</html>