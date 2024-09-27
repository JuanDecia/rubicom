<?php
if (isset($_POST['task'])) {
    $task = $_POST['task'];
    $tareas = json_decode(file_get_contents('tasks.json'), true);
    $tareas[] = ["name" => $task];
    file_put_contents('tasks.json', json_encode($tareas));
    echo 'Tarea añadida con éxito';
}
?>
