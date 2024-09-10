<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $metros = floatval($_POST['metro']);
        $unidad = $_POST['unidad'];

        switch ($unidad) {
            case 'pulgadas':
                $resultado = $metros * 39.3701;
                $unidadTexto = 'pulgadas'; // necesario para el texto del resultado
                break;

            case 'centimetros':
                $resultado = $metros * 100;
                $unidadTexto = 'centímetros';
                break;

            case 'pies':
                $resultado = $metros * 3.28084;
                $unidadTexto = 'pies';
                break;

            default:
                $resultado = 0;
                $unidadTexto = '';
                break;
        }

        echo "<p>$metros metros son " . round($resultado, 2) . " $unidadTexto.</p>";
    }
?>