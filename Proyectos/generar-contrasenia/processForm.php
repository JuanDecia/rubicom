<?php
                
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
    $longitud = $_POST['longitud'];
    $incluir_mayusculas = isset($_POST['mayusculas']);
    $incluir_numeros = isset($_POST['numeros']);
    $incluir_caracteres_especiales = isset($_POST['caracteres_especiales']);

    header('application/json');

    if (is_numeric($monto) && is_numeric($propina)) {

        $result = [
            'monto' => $monto,
            'propina' => $propina
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