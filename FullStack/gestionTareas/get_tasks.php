<?php

require_once 'TaskManager.php';

header('application/json');
$taskManager = new TaskManager('tasks.json');

echo json_encode($taskManager->getTasks());
?>
