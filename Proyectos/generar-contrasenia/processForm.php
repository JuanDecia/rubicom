<?php
                
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
    $longitud = $_POST['longitud'];
    $incluir_mayusculas = isset($_POST['mayusculas']);
    $incluir_numeros = isset($_POST['numeros']);
    $caracteresEspeciales = isset($_POST['caracteres_especiales']);

    header('application/json');

    if ($longitud > 0) {

        $result = [
            'longitud' => $longitud,
            'incluirMayuscula' => $incluir_mayusculas,
            'incluirNumeros' => $incluir_numeros,
            'caracteresEspeciales' => $caracteresEspeciales
        ];

        echo json_encode($result);

    } else {

        $result = [
            'errorMsg' => 'Los valores ingresados no son correctos.'
        ];

        echo json_encode($result);
    }
}
?>