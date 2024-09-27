<?php

if (isset($_POST['name']) && isset($_POST['datetime'])) {
    $name = $_POST['name'];
    $datetime = $_POST['datetime'];

    // read exist turns
    $turnos = json_decode(file_get_contents('turns.json'), true);

    // add new turn to array
    $turnos[] = [
        'name' => $name, 
        'datetime' => $datetime
    ];

    // save changes to json file
    file_put_contents('turns.json', json_encode($turnos));

    echo 'Turno agendado con exito';
}

?>