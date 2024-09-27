<?php
if (isset($_POST['id']) && isset($_POST['new_name'])) {
    $taskId = $_POST['id'];
    $newTaskName = $_POST['new_name'];
    $tareas = json_decode(file_get_contents('tasks.json'), true);
    $tareas[$taskId]['name'] = $newTaskName; // Actualizar la tarea
    file_put_contents('tasks.json', json_encode($tareas));
    echo 'Tarea editada con éxito';
}
?>
