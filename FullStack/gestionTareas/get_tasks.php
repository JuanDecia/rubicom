<?php
header('application/json');
// Leer tareas desde un archivo JSON
$tareas = file_get_contents('tasks.json');
echo $tareas;
?>
