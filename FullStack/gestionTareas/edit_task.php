<?php

require_once 'TaskManager.php';

if (isset($_POST['id']) && isset($_POST['new_name'])) {
    $taskManager = new TaskManager('tasks.json');

    $taskId = $_POST['id'];
    $newTaskName = $_POST['new_name'];
    $taskManager->editTask($taskId, $newTaskName);
    
    echo 'Tarea editada con éxito';
}
?>
