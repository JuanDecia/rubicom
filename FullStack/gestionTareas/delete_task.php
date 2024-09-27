<?php
if (isset($_POST['id'])) {
    $taskId = $_POST['id'];
    $tareas = json_decode(file_get_contents('tasks.json'), true);
    unset($tareas[$taskId]); // Eliminar la tarea
    $tareas = array_values($tareas); // Reindexar el array
    file_put_contents('tasks.json', json_encode($tareas));
    echo 'Tarea eliminada con éxito';
}
?>
