<?php

header('application/json');

if (isset($_POST['id'])) {
    $taskId = $_POST['id'];
    $newTask = $_POST['new_task'];

    //read tasks
    $tareas = json_decode(file_get_contents('tasks.json'), true);


}

?>