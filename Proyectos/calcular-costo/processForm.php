<?php
                
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
    $monto = intval($_POST['monto']);
    $propina = intval($_POST['propina']) ;

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