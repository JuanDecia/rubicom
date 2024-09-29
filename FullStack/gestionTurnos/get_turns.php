<?php

header('application/json');

require_once ('TurnManager.php');

$turnManager = new TurnManager('turns.json');

echo json_encode($turnManager->getTurns());

?>