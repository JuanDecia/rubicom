<?php

if (isset($_POST['id'])) {
    $turnId = $_POST['id'];

    $turnos = json_decode(file_get_contents('turns.json'), true);

    unset($turnos[$turnId]);

    $turnos = array_values($turnos);

    file_put_contents('turns.json', json_encode($turnos));

    echo 'Turno eliminado con éxito';
}

?>