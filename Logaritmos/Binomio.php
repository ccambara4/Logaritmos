<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expansion de Binomios</title>
    <style>
        /* Estilo para el bot�n */
        button {
            background-color: lightgreen;
            color: black;
            font-weight: bold;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <h1>Expansion de Binomios</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="potencia">Ingrese la potencia del binomio:</label>
        <input type="number" name="potencia" id="potencia" min="0" required><br><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    function calcularCoeficiente($n, $k)
    {
        if ($k == 0 || $k == $n) {
            return 1;
        } else {
            return calcularCoeficiente($n - 1, $k - 1) + calcularCoeficiente($n - 1, $k);
        }
    }

    function expandirBinomio($a, $b, $n)
    {
        echo "(a + b)^$n = ";
        for ($i = $n; $i >= 0; $i--) {
            $coeficiente = calcularCoeficiente($n, $i);
            if ($coeficiente != 1) {
                echo "$coeficiente";
            }
            if ($i > 0) {
                echo "a";
                if ($i > 1) {
                    echo "^$i";
                }
            }
            if ($n - $i > 0) {
                echo "b";
                if ($n - $i > 1) {
                    echo "^" . ($n - $i);
                }
            }
            if ($i > 0) {
                echo " + ";
            }
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $potencia = intval($_POST["potencia"]);
        expandirBinomio('a', 'b', $potencia);
    }
    ?>
</body>
</html>