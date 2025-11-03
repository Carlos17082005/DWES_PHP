<?php
    include 'pokerldv_fun.php';

    $nombres = array(test_input($_POST['nombre1']));
    $nombres[] = test_input($_POST['nombre2']);
    $nombres[] = test_input($_POST['nombre3']);
    $nombres[] = test_input($_POST['nombre4']);

    $jugadores = crearJugadores($nombres, count($nombres));
    imprimir($jugadores);

    echo '<br><br><h2>Ganadores: </h2><hr>';
    foreach ($jugadores as $value)  {
        if ($value[3])  {
            echo '<h3>'.$value[0].'</h3>';
            echo '<p>Con un premio de '.$value[4].'</p><br>';
        }
    } 
?>