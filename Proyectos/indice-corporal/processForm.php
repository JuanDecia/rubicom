<?php
                
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];

    header('application/json');

    if (isset($peso) && isset($altura)) {

        $result = [
            'peso' => $peso,
            'altura' => $altura
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