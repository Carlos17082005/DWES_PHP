<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function crearCartas()  {  // Array con tadas las cartas del juego
        // Devuelve un array con las cartas 
        $cartas = array('1C1', '1C2', '1D1', '1D2', '1P1', '1P2', '1T1', '1T2', 
                        'JC1', 'JC2', 'JD1', 'JD2', 'JP1', 'JP2', 'JT1', 'JT2', 
                        'KC1', 'KC2', 'KD1', 'KD2', 'KP1', 'KP2', 'KT1', 'KT2', 
                        'QC1', 'QC2', 'QD1', 'QD2', 'QP1', 'QP2', 'QT1', 'QT2');
        return $cartas;
    }

    function crearJugadores($nombres, $numJ)  {  // Crea un array que guarda los datos de todos los jugadores
        // Recibe un array con los nombre de los jugadores, el numero de jugadores que hay que crear
        // Devuelve un array con los jugadores
        $cartasMezcladas = crearCartas();
        shuffle($cartasMezcladas);  // Mezcla las cartas de la baraja
        $contador = 0;

        $jugadores = array();
        for($i = 0; $i < $numJ; $i++)  {
            $jugadores[$i] = array($nombres[$i], cartasJugador($contador, $cartasMezcladas));
            $jugadores[$i][] = pareja($jugadores[$i][1]);
        }
        $jugadores = ganador($jugadores);
        return $jugadores;
    }

    function cartasJugador(&$contador, $cartasMezcladas)  {  // Asigna 4 cartas a cada jugador
        // Resibe un array con todas las cartas del juego desordenadas y un contador para no repertir cartas
        // Devuelve un array con 4 cartas
        for($j = 0; $j < 4; $j++)  {
            $cartas[] = $cartasMezcladas[$contador];
            $contador++;
        }
        return $cartas;
    }

    function pareja($cartas)  {  // Cuentas cuantas cartas de cada valor tiene cada jugador 
        // Recibe las cartas del jugador
        // Devuelve un str con la jugada con obtuvo el jugador
        $contador = array(0, 0, 0, 0);
        foreach ($cartas as $valor)  {
            switch (substr($valor, 0, 1))  {
                case '1': $contador[0]++; break; 
                case 'J': $contador[1]++; break;
                case 'Q': $contador[2]++; break;
                case 'K': $contador[3]++; break;
            }
        }
        $juego = '';
        $pareja = false;

        foreach ($contador as $valor)  {
            obtenerPareja($pareja, $juego, $valor);
        }
        return $juego;
    }

    function obtenerPareja(&$pareja, &$juego, $contador)  { // Verifica que jugada tiene cada jugador
        // Recibe por referencia un str y un booleano y por valor un number 
        if (!$pareja)  {
            $pareja = true;
            if ($contador == 2)  { $juego = 'Pareja'; }
            elseif ($contador == 3)  { $juego = 'Trio'; }
            elseif ($contador == 4)  { $juego = 'Poker'; }
            else  { $pareja = false; }    
        }
        elseif ($juego == 'Pareja')  {
            if ($contador > 1)  {
                $juego = 'Doble Pareja';
            }
        }
    }

    function ganador($jugadores)  { // Determina cual es la jugada ganadora y asigna un booleano a cada jugador
        // Recibe el array con todos los datos de los jugadores
        // Devuelve el mismo array añadiendo un booleano 
        $prioridad = array('Poker', 'Trio', 'Doble Pareja', 'Pareja');
        $ganador = '';
        foreach ($prioridad as $gana)  {
            foreach ($jugadores as $valor)  {
                if ($valor[2] == $gana)  {
                    $ganador = $gana;
                    break;
                }
            }  
            if ($ganador != '')  {
                break;
            }  
        }
        
        for($i = 0; $i < count($jugadores); $i++)  {
                if ($jugadores[$i][2] == $ganador)  {
                    $jugadores[$i][] = true;
                }
                else  {
                    $jugadores[$i][] = false;
                }
        }
        $jugadores = bote($jugadores, $ganador);
        return $jugadores;
    }

    function bote($jugadores, $ganador)  {  // Reparte el premio entre los jugadores
        // Recibe e array con los datos de los jugadores y un str con la jugada ganadora
        // Devuelve el mismo array añadiendo un number
        $bote = test_input($_POST['bote']);
        $contador = 0;

        if ($ganador == '')  { $bote = $bote * 0; }
        elseif ($ganador == 'Trio')  { $bote = $bote * 0.7; }
        elseif ($ganador == 'Doble Pareja')  { $bote = $bote * 0.5; }
        elseif ($ganador == 'Pareja')  { $bote = $bote * 0; }

        foreach ($jugadores as $value)  {
            if ($value[3])  {
                $contador++;
            }
        }

        for ($i = 0; $i < count($jugadores); $i++)  {
            if ($jugadores[$i][2] == $ganador)  {
                $jugadores[$i][] = $bote/$contador;
            }
        }
        return $jugadores;
    }

    function imprimir($jugadores)  { // Imprime por pantalla 
        // Recibe el array con los datos de los jugadores 
        echo "<style>table  { border: 1px, solid; border-collapse: collapse; }tr, td, th  { border: 1px, solid; border-collapse: collapse; }th  { font-weight: blod; }</style>";
        echo "<table>";
        foreach ($jugadores as $value)  {
            echo "<tr><td>".$value[0].'</td>';
            for ($i = 0; $i < count($value[1]); $i++)  {
                echo '<td><img style="width: 100px;" src="images/'.$value[1][$i].'.PNG"></td>';
            }
            echo '<td>'.$value[2].'</td>';
            echo '</tr>';
        }
        echo '</table>';       
    }
?>