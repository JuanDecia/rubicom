<?php

    // OBTENER LOS PARES DEL NÚMERO INGRESADO
    function buscarPares($num) {
        $numerosPares = [1];

        for ($i = 0; $i < $num; $i++) {
            if ($i % 2 == 0) { 
                $numerosPares[] = $i;
            }
        }

        return $numerosPares;
    }

    // SUMAR LOS PARES
    function sumarPares($numerosPares) {
        return array_sum($numerosPares);
    }

    // VERIFICAR PETICIÓN Y RETORNAR RESULTADO
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $numeroUsuario = $_POST['numero'];

        if (!empty($numeroUsuario) && is_numeric($numeroUsuario)) {
            $numeroUsuario = intval($numeroUsuario);

            $obtenerPares = buscarPares($numeroUsuario);

            echo 'Los números pares que se encuentran entre el rango de 1 y del número ' .$numeroUsuario. ' son: ' .implode(", ", $obtenerPares). '<br>';

            $resultado = sumarPares($obtenerPares);

            echo 'La suma de los números pares es: ' .$resultado;
        } else {
            echo 'Ingrese un número por favor.';
        }
    }
?>