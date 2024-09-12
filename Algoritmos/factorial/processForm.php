<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $userNumber = intval($_POST['factorial']);

    header('application/json');

    if (isset($userNumber)) {
        
        $result = [
            'userNumber' => $userNumber
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