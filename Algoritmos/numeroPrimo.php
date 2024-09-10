<?php

    // Verificar si es primo
    function esPrimo($numero) {

        if ($numero < 2) {
            return false;
        }

        for ($i = 2; $i < $numero; $i++) {
            if ($numero % $i == 0) {
                return false;
            }
        }

        return true;
    };

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $numeroUsuario = $_POST['numero-primo'];

        if (!empty($numeroUsuario) && is_numeric($numeroUsuario)) {
            $numeroUsuario = intval($numeroUsuario);

            if (esPrimo($numeroUsuario)) {
                echo 'El numero ' .$numeroUsuario. ' es primo.';
            } else {
                echo 'El numero ' .$numeroUsuario. ' no es primo.';
            }
        };
    };

?>