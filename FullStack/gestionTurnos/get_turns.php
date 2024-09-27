<?php

header('application/json');
    
// Read turns from json file
$turnos = file_get_contents('turns.json');
echo $turnos;

?>