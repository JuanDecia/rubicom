<?php

require_once ('TurnManager.php');

if (isset($_POST['name']) && isset($_POST['datetime'])) {
    $turnManager = new TurnManager('turns.json');

    $name = $_POST['name'];
    $datetime = $_POST['datetime'];

    $turnManager->addTurn($name, $datetime);

    echo 'Turno agendado con exito';
}

?>