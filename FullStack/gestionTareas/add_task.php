<?php

header('application/json');

// Get task send to ajax
if (isset($_POST['task'])) {
    $task = $_POST['task'];

    // Read tasks
    $tareas = json_decode(file_get_contents('tasks.json'), true);

    // Add new task to the array
    $tareas[] = ['name' => $task];

    // save again in the JSON file
    file_put_contents('tasks.json', json_encode($tareas));

    echo 'Tarea añadida con éxito';
}

?>