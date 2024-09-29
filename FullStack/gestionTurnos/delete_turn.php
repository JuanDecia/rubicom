<?php

require_once 'TurnManager.php';

if (isset($_POST['id'])) {
    $turnManager = new TurnManager('turns.json');

    $turnId = $_POST['id'];
    $turnManager->deleteTurn($turnId);

    echo 'Turno eliminado con éxito';
} else {
    echo 'No se encontró el id del turno';
}
?>