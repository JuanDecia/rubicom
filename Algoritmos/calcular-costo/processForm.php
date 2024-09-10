<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $monto = $_POST['monto'];
    $propina = $_POST['propina'];

    header('application/json');

    if (is_numeric($monto) && is_numeric($propina)) {

        // Arreglo de valores
        $result = [
            'monto' => $monto,
            'propina' => $propina
        ]; 

        echo json_encode($result);
    } else {
        http_response_code(409);

        $result = [
            'errorMsg' => 'Los valores ingresados no son correctos'
        ];

        echo json_encode($result);
    }
}
?>
