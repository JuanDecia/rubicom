<?php
                
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
    $monto = floatval($_POST['monto']);
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];

    header('application/json');

    if (isset($monto) && isset($origen) && isset($destino)) {

        $result = [
            'monto' => $monto,
            'origen' => $origen,
            'destino' => $destino
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