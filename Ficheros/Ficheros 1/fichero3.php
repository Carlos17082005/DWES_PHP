<?php
    echo "<style>
                table  { border: 1px, solid; border-collapse: collapse; }
                tr, td, th  { border: 1px, solid; border-collapse: collapse; }
                th  { font-weight: blod; }
            </style>";
    echo "<h1>Datos alumno</h1><table>";

    $contador = 0;

    function imprimir($nom, $ap1, $ap2, $fec, $loc)  {
        echo "<tr><td>".$nom."</td><td>".$ap1."</td><td>".$ap2."</td><td>".$fec."</td><td>".$loc."</td></tr>";
    }
        
    function fichero(&$contador)  {
        $f1=fopen("txt/alumnos1.txt","r");
        if ($f1) {
            while (!feof($f1)) {
                $linea = fgets($f1);
                if ($linea != "")  {
                    $contador++;
                    $nom = substr($linea,0,40);
                    $ap1 = substr($linea,40,40);
                    $ap2 = substr($linea,81,41);
                    $fec = substr($linea,123,10);
                    $loc = substr($linea,133,26);
                    imprimir($nom, $ap1, $ap2, $fec, $loc);
                }
            }
            fclose($f1);
        }    
    }
    
    fichero($contador);    
    echo "</table>";
    echo '<br>Se han leido '.$contador.' lineas';
?>