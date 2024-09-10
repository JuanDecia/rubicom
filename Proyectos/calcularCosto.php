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
    <main class='container-fluid d-flex justify-content-center align-items-center vh-100'>

        <div class='container  p-2 main-content'>
            <div class='container-fluid text-center'>
                <h1>Calcular Costo</h1>
            </div>
            <div class='p-4'>
                
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="monto" class="form-label">Monto total de la cuenta</label>
                        <input type="number" class="form-control" id="monto" name="monto" step="0.01" min="0" required>
                    </div>
                    <div class="mb-3">
                        <label for="propina" class="form-label">Porcentaje de propina (%)</label>
                        <input type="number" class="form-control" id="propina" name="propina" step="0.01" min="0" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular</button>
                </form>

                <?php
                
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
                    $monto = $_POST['monto'];
                    $propina = $_POST['propina'];

                    
                    $valorPropina = ($monto * $propina) / 100;

                    
                    $total = $monto + $valorPropina;

                    // Mostrar el resultado
                    echo "<div class='mt-4'>";
                    echo "<h2>Resultados</h2>";
                    echo "<p>Monto de la cuenta: $" . number_format($monto, 2) . "</p>";
                    echo "<p>Propina (" . $propina . "%): $" . number_format($valorPropina, 2) . "</p>";
                    echo "<p><strong>Total a pagar: $" . number_format($total, 2) . "</strong></p>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </main>
</body>
</html>