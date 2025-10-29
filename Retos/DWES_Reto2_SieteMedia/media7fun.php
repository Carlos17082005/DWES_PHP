<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function crearCartas()  {  // Crea un array con todas las cartas del juego
        // Devuelve un array de strings con las cartas del juego
        $cartas = array();
        $palos = array('C', 'T', 'D', 'P');  // Palos de la baraja
        $numero = array('1', '2', '3', '4', '5', '6', '7', 'Q', 'J', 'K'); // Valor de las cartas de la baraja 
        foreach ($palos as $palo)  {
            foreach ($numero as $valor)  {
                $cartas[] = $valor.$palo;
            }
        }    
        return $cartas;
    }

    function cartasJugador(&$contador, $cartasMezcladas, $numC)  {  // Asigna n cartas a cada jugador
        // Resive el numero de cartas para cada jugador y un array con todas las cartas del juego desordenadas y un contador para no repertir cartas
        // Devuelve un array con n cartas del juego
        for($j = 0; $j < $numC; $j++)  {
            $cartas[] = $cartasMezcladas[$contador];
            $contador++;
        }
        return $cartas;
    }

    function puntuacionJugador($cartas)  { // Calcula cuantos puentos tiene cada jugador
        // Recibe un array con las cartas de cada jugador
        // Devuelve un int con cuantos puntos tiene
        $puntuacion = 0;
        foreach ($cartas as $carta)  {
            $carta = substr($carta, 0, 1);
            switch ($carta)  {
                case '1': case '2': case '3':  case '4': case '5': case '6': case '7': $puntuacion += (int)$carta; break;
                case 'J': case 'Q': case 'K': $puntuacion += 0.5; break;
            }
        }
        return $puntuacion;
    }

    function crearJugadores($nombres, $numJ, $numC)  {  // Crea un array que guarda las cartas de todos los jugadores
        // Recibe un array con los nombre de los jugadores, el numero de jugadores que hay que crear y con cuantas cartas hay que repartir a cada uno 
        // Devuelve un array con los jugadores
        $cartasMezcladas = crearCartas();
        shuffle($cartasMezcladas);  // Mezcla las cartas de la baraja
        $contador = 0;

        $jugadores = array();
        for($i = 0; $i < $numJ; $i++)  {
            $jugadores[$nombres[$i]] = cartasJugador($contador, $cartasMezcladas, $numC);
            $jugadores[$nombres[$i]][] = puntuacionJugador($jugadores[$nombres[$i]]);
        }
        $jugadores = ganador($jugadores);
        $jugadores = apuesta($jugadores);
        return $jugadores;
    }

    function ganador(&$jugadores)  {  // Determina si un jugador gana o no
        // Recibe un array asosiativo bidimencional
        // Devuelve el mismo array con los jugadores que han ganado marcados con un booleano
        $nG = 0;
        foreach ($jugadores as $value)  {
            if ($value[count($value)-1] > $nG && $value[count($value)-1] <= 7.5)  {
                $nG = $value[count($value)-1];
            }
        }
        $c = array_keys($jugadores);
        for($i = 0; $i < count($jugadores); $i++)  {
            if ($jugadores[$c[$i]][count($jugadores[$c[$i]])-1] == $nG)  {
                $jugadores[$c[$i]][] = true;
            } 
            else  {
                $jugadores[$c[$i]][] = false;
            }
        }
        return $jugadores;
    }

    function apuesta($jugadores)  {  // Calcula cuanto de la apuesta les corresponde a cada jugador
        // Recibe el array con los jugadores
        // Devuelve el mismo array agragando la parte de la apuesta que se lleva cada jugador 
        $apuesta = test_input($_POST['apuesta']);
        $contador = 0;
        foreach ($jugadores as $value)  {
            if ($value[count($value)-1])  {
                $contador++;
            }
        }
        $c = array_keys($jugadores);
        for($i = 0; $i < count($jugadores); $i++)  {
            if ($jugadores[$c[$i]][count($jugadores[$c[$i]])-1])  {
                if (in_array(7.5, $jugadores[$c[$i]], true))  {
                    $jugadores[$c[$i]][] = (($apuesta * 0.8)/$contador);
                }
                else  {
                    $jugadores[$c[$i]][] = (($apuesta * 0.5)/$contador);
                }
            } 
            else  {
                $jugadores[$c[$i]][] = 0;
            }
        }
        return $jugadores;
    }

    function fichero($cadena, $time)  {  // Imprime en el fichero
        // Recibe una cadena de texto y el parametro $time que es el nombre del fichero
        $f1=fopen("txt/".$time.".txt","a+");
        fwrite($f1,($cadena."\n"));
        fclose($f1);
    }

    function imprimir($jugadores)  { // Imprime por pantalla 
        // Recibe el array de los jugadores 
        echo "<style>table  { border: 1px, solid; border-collapse: collapse; }tr, td, th  { border: 1px, solid; border-collapse: collapse; }th  { font-weight: blod; }</style>";
        $ganadores = '';
        $puntos = 0;
        $premio = 0;
        echo "<table>";
        foreach ($jugadores as $clave => $value)  {
            if ($value[count($value)-2])  {
                if ($ganadores == '')  {
                    $ganadores = $clave;
                }
                else  {
                    $ganadores .= ', '.$clave;
                }
                $premio = $value[count($value)-1];
                $puntos = $value[count($value)-3];
            }
            echo "<tr><td>".$clave.'</td>';
            for ($i = 0; is_string($value[$i]); $i++)  {
                echo '<td><img style="width: 100px;" src="images/'.$value[$i].'.PNG"></td>';
            }
            echo '</tr>';
        }
        echo '</table>';
        if ($ganadores == '')  {
            $apuesta = test_input($_POST['apuesta']);
            $ganadores = 'No ha ganado nadie, bote acumulado = '.$apuesta;
        }
        else  {
           $ganadores .= ' han ganado con una puntuacion de '.$puntos.'<br>Los ganadores han obtenido '.$premio.'€ de premio';
        }
        echo $ganadores;
    }
?>