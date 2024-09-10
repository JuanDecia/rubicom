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
    <main class='container-fluid d-flex justify-content-center align-items-center vh-100 cont-4'>

        <div class='container p-2 main-content'>
            <div class='container-fluid text-center'>
                <h1>Calcula tu IMC</h1>
            </div>
            <div class='p-4'>
                
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso (kg)</label>
                        <input type="number" class="form-control" id="peso" name="peso" step="0.1" required>
                    </div>
                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura (m)</label>
                        <input type="number" class="form-control" id="altura" name="altura" step="0.01" placeholder='Ej: 1.83 (colocar punto)' required>
                    </div>
                    <button type="submit" class="btn btn-primary">Calcular IMC</button>
                </form>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                        $peso = $_POST['peso'];
                        $altura = $_POST['altura'];
    
                        // Calcular IMC
                        $imc = $peso / ($altura * $altura);
                        $imc = round($imc, 2); // Redondear a 2 decimales
    
                        
                        $categoria = '';
                        $barra_clase = '';
    
                        if ($imc < 18.5) {
                            $categoria = 'Bajo peso';
                            $barra_clase = 'bg-warning';
                        } elseif ($imc >= 18.5 && $imc <= 24.9) {
                            $categoria = 'Normal';
                            $barra_clase = 'bg-success';
                        } elseif ($imc >= 25 && $imc <= 29.9) {
                            $categoria = 'Sobrepeso';
                            $barra_clase = 'bg-warning';
                        } else {
                            $categoria = 'Obesidad';
                            $barra_clase = 'bg-danger';
                        }
    
                        // Mostrar resultado numérico y visual
                        echo "<div class='mt-4'>";
                            echo "<h2>Tu IMC es: $imc</h2>";
                            echo "<p class='text-muted'>$categoria</p>";
    
                            echo "<div class='progress'>";
                                echo "<div class='progress-bar $barra_clase' role='progressbar' style='width: " . ($imc * 2) . "%' aria-valuenow='$imc' aria-valuemin='0' aria-valuemax='50'></div>";
                            echo "</div>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>