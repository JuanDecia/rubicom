<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $meter = floatval($_POST['meters']);
    $unityConverter = $_POST['unity'];

    header('application/json');

    if (isset($meter) && isset($unityConverter)) {
        
        $result = [
            'meter' => $meter,
            'unityConverter' => $unityConverter
        ];

        echo json_encode($result);
    } else {

        $result = [
            'errorMsg' => 'Los valores ingresados no son correctos.'
        ];

        echo json_encode($result);
    }

}