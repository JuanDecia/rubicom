<?php

require_once 'TaskManager.php';

if (isset($_POST['task'])) {
    $taskManager = new TaskManager('tasks.json');

    $task = $_POST['task'];
    $taskManager->addTask($task);

    echo 'Tarea añadida con éxito';
}
?>
