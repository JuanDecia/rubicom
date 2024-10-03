<?php

// Get Class
require_once 'TaskManager.php';

// Check wheter 'task' is a not void variable or check wheter is declared.
if (isset($_POST['task'])) {

    $taskManager = new TaskManager('tasks.json');

    $task = $_POST['task'];
    $taskManager->addTask($task);

    echo 'Tarea añadida con éxito';
}
?>
