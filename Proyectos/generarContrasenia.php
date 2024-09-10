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
    <main class='container-fluid d-flex justify-content-center align-items-center vh-100 cont-3'>

        <div class='container  p-2 main-content'>
            <div class='container-fluid text-center'>
                <h1>Generar Contraseña</h1>
            </div>
            <div class='p-4'>
                
                <form method="post" action="">
                    <div class="mb-3">
                        <label for="longitud" class="form-label">Longitud de la contraseña</label>
                        <input type="number" class="form-control" id="longitud" name="longitud" min="4" max="64" placeholder='4 - 64 caracteres' required>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="mayusculas" name="mayusculas">
                        <label class="form-check-label" for="mayusculas">Incluir mayúsculas</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="numeros" name="numeros">
                        <label class="form-check-label" for="numeros">Incluir números</label>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="caracteres_especiales" name="caracteres_especiales">
                        <label class="form-check-label" for="caracteres_especiales">Incluir caracteres especiales</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Generar</button>
                </form>

                <?php
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                        $longitud = $_POST['longitud'];
                        $incluir_mayusculas = isset($_POST['mayusculas']);
                        $incluir_numeros = isset($_POST['numeros']);
                        $incluir_caracteres_especiales = isset($_POST['caracteres_especiales']);
    
                        // Definir los caracteres básicos
                        $caracteres = 'abcdefghijklmnopqrstuvwxyz';
                        
                        // Agregar mayúsculas si es necesario
                        if ($incluir_mayusculas) {
                            $caracteres .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        }
                        
                        // Agregar números si es necesario
                        if ($incluir_numeros) {
                            $caracteres .= '0123456789';
                        }
                        
                        // Agregar caracteres especiales si es necesario
                        if ($incluir_caracteres_especiales) {
                            $caracteres .= '!@#$%^&*()-_=+[]{}|;:,.<>?';
                        }
    
                        // Generar la contraseña
                        $password = '';
                        for ($i = 0; $i < $longitud; $i++) {
                            $password .= $caracteres[random_int(0, strlen($caracteres) - 1)];
                        }
    
                        // Mostrar la contraseña generada
                        echo "<div class='mt-4'>";
                        echo "<h2>Contraseña Generada</h2>";
                        echo "<p class='text-success'>$password</p>";
                        echo "</div>";
                    }
                ?>
            </div>
        </div>
    </main>
</body>
</html>