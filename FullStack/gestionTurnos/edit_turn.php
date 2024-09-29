<?php

require_once('TurnManager.php');

if (isset($_POST['id']) && isset($_POST['new_name']) && isset($_POST['new_datetime'])) {
    $turnManager = new TurnManager('turns.json');

    $turnId = $_POST['id'];
    $newTurnName = $_POST['new_name'];
    $newDatetime = $_POST['new_datetime'];

    $turnManager->editTurn($turnId, $newTurnName, $newDatetime);

    echo 'Turno editado con éxito';
} else {
    echo 'Error: faltan parámetros';
}
?>
