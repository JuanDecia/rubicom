<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $arreglo = range(1, 10);

        $numeroUsuario = $_POST['buscar-numero'];
        
        if (!empty($numeroUsuario) && is_numeric($numeroUsuario)) {

            $numeroUsuario = intval($numeroUsuario);

            // Busca valor en el arreglo y devuelve el índice.
            $posicion = array_search($numeroUsuario, $arreglo);

            if ($posicion =! false) {
                echo "El número " .$numeroUsuario. " se encuentra en la posición " .($posicion - 1). " del arreglo.";
            } else {
                echo "El número " .$numeroUsuario. " no se encuentra en el arreglo.";
            }
        }
        
    }

?>