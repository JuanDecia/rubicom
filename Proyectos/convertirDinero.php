<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Css -->
    <link rel="stylesheet" href="styles.css" />
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>Document</title>
</head>
<body>
    <main class='container-fluid d-flex justify-content-center align-items-center vh-100 cont-2'>

        <div class='container  p-2 main-content'>
            <div class='container-fluid text-center'>
                <h1>Convertir Dinero</h1>
            </div>
            <div class='p-4'>
                
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="monto" class="form-label">Monto a convertir</label>
                        <input type="number" class="form-control" id="monto" name="monto" step="0.01" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="origen" class="form-label">Moneda de origen</label>
                        <select class="form-select" id="origen" name="origen" required>
                            <option value="USD">Dólar Estadounidense (USD)</option>
                            <option value="EUR">Euro (EUR)</option>
                            <option value="GBP">Libra Esterlina (GBP)</option>
                            <option value="JPY">Yen Japonés (JPY)</option>
                            <option value="ARS">Peso Argentino (ARS)</option>
                            <!-- Agregar más monedas según sea necesario -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="destino" class="form-label">Moneda de destino</label>
                        <select class="form-select" id="destino" name="destino" required>
                            <option value="USD">Dólar Estadounidense (USD)</option>
                            <option value="EUR">Euro (EUR)</option>
                            <option value="GBP">Libra Esterlina (GBP)</option>
                            <option value="JPY">Yen Japonés (JPY)</option>
                            <option value="ARS">Peso Argentino (ARS)</option>
                            <!-- Agregar más monedas según sea necesario -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Convertir</button>
                </form>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                        $monto = $_POST['monto'];
                        $origen = $_POST['origen'];
                        $destino = $_POST['destino'];
    
                        // Reemplazar con API o datos reales. .
                        $tasasCambio = [
                            "USD" => 1.00,  // Dólar Estadounidense
                            "EUR" => 0.85,  // Euro
                            "GBP" => 0.75,  // Libra Esterlina
                            "JPY" => 110.00, // Yen Japonés
                            "ARS" => 350.00  // Peso Argentino
                        ];
    
                        
                        if (isset($tasasCambio[$origen]) && isset($tasasCambio[$destino])) {
                            
                            $montoConvertido = ($monto / $tasasCambio[$origen]) * $tasasCambio[$destino];
    
                            // Mostrar el resultado
                            echo "<div class='mt-4'>";
                            echo "<h2>Resultado de la Conversión</h2>";
                            echo "<p>Monto: $$monto $origen</p>";
                            echo "<p>Convertido a: $" . number_format($montoConvertido, 2) . " $destino</p>";
                            echo "</div>";
                        } else {
                            echo "<div class='mt-4 text-danger'><p>Error: Monedas no soportadas.</p></div>";
                        }
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>