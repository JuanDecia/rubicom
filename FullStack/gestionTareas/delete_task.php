<?php

require_once 'TaskManager.php';

if (isset($_POST['id'])) {
    $taskManager = new TaskManager('tasks.json');

    $taskId = $_POST['id'];
    $taskManager->deleteTask($taskId);
    
    echo 'Tarea eliminada con éxito';
}
?>
