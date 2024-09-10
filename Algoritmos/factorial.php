<?php

    // CALCULAR FACTORIAL
    function factorial($numero) {
        $resultado = 1;
        for ($i = 2; $i <= $numero; $i++) {
            $resultado *= $i;
        }

        return $resultado;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $numeroUsuario = $_POST['numero-factorial'];

        if (!empty($numeroUsuario) && is_numeric($numeroUsuario)) {
            $numeroUsuario = intval($numeroUsuario);

            echo 'El factorial de ' .$numeroUsuario. ' es: ' .factorial($numeroUsuario);
        } else {
            echo 'Ingrese un número por favor.';
        }
    }

?>