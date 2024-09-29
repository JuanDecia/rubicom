<?php
header('application/json');

require_once 'TaskManager.php';

$taskManager = new TaskManager('tasks.json');

echo json_encode($taskManager->getTasks());
?>
