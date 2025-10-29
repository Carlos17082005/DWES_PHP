<?php
    include 'media7fun.php';

    $nombres = array(test_input($_POST['nombre1']));
    $nombres[] = test_input($_POST['nombre2']);
    $nombres[] = test_input($_POST['nombre3']);
    $nombres[] = test_input($_POST['nombre4']);
    $numcartas = test_input($_POST['numcartas']);
    $apuesta = test_input($_POST['apuesta']);

    $j = (crearJugadores($nombres, 4, $numcartas));
    $time = date("Y-m-d_H-i-s");
    $contador = 0;
    $total = 0;
    foreach ($j as $value)  {
        if ($value[count($value)-2])  {
            $contador++;
            $total = $value[count($value)-1];
        }
    }
    foreach ($j as $clave => $jugador)  {
        $iniciales = substr($clave, 0, 1);
        if (strpos($clave, ' ') != false)  {
            $iniciales .= substr($clave, strpos($clave, ' ') + 1, 1);
        }
        $cadena = $iniciales.'#'.$jugador[count($jugador)-3].'#'.$jugador[count($jugador)-1];
        fichero($cadena, $time);
    }
    fichero('...' , $time);
    fichero('TOTALPREMIOS#'.$contador.'#'.$total ,$time);
    imprimir($j);
?>