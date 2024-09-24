<?php

header('application/json');

if (isset($_POST['id'])) {
    $taskId = $_POST['id'];

    // Read tasks
    $tareas = json_decode(file_get_contents('tasks.json'), true);

    // Delete task with its Id
    unset($tareas[$taskId]);

    // Array reindex
    $tareas = array_values($tareas);

    // Save again in the JSON file
    file_put_contents('tasks.json', json_encode($tareas));

    echo 'Tarea eliminada con éxito';
}
?>