<?php
    function imprimir()  {
        echo "<style>
                table  { border: 1px, solid; border-collapse: collapse; }
                tr, td, th  { border: 1px, solid; border-collapse: collapse; }
                th  { font-weight: blod; }
            </style>";
        echo "<h1>Datos alumno</h1><table>";

        $f1=fopen("datos.txt","r");
        if ($f1) {
            while (!feof($f1)) {
                $c = fgets($f1);
                $n = (substr($c,0,strpos($c, ",")));
                $c = substr($c,strpos($c, ",")+1, strlen($c));
                $a = (substr($c,0,strpos($c, ",")));
                $c = substr($c,strpos($c, ",")+1, strlen($c));
                $e = (substr($c,0,strpos($c, ",")));
                $s = substr($c,strpos($c, ",")+1, strlen($c));
                echo "<tr><td>".$n."</td><td>".$a."</td><td>".$e."</td><td>".$s."</td></tr>";
            }
            fclose($f1);
        }
        echo "</table>";

    }

    function fichero($cadena)  {
        $f1=fopen("datos.txt","a+");
        fwrite($f1,("\n".$cadena));
        fclose($f1);
    }

    function borrar()  {
        $f1=fopen("datos.txt","w+");
        fwrite($f1,("Nombre, Apellidos, Email, Sexo"));
        fclose($f1);
    }

    if (isset($_POST['borrar']))  {
        borrar();
    }

    fichero($cadena = $_POST['nombre'].", ".$_POST['apellido1']." ".$_POST['apellido2'].", ".$_POST['email'].", ".$_POST['sexo']);
    imprimir();

?>