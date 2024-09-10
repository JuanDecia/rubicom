<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $valorUsuario = intval($_POST['longitud']);
        $secuencia = '';

        // Genera alfabeto.
        $alfabeto = range('a', 'z');

        if (!empty($valorUsuario) && is_numeric($valorUsuario)) {

            for ($i = 0; $i < $valorUsuario; $i++) {
                $secuencia .= $alfabeto[$i % count($alfabeto)];
            }

            echo "Secuencia alfabética de longitud " .$valorUsuario. ": " .$secuencia. "";
        }

    }

?>