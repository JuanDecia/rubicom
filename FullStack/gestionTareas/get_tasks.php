<?php

// Read tasks from JSON file
$tareas = file_get_contents('tasks.json');
echo $tareas;

?>