<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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

    $nombre = test_input($_POST['nombre']);
    $apellido1 = test_input($_POST['apellido1']);
    $apellido2 = test_input($_POST['apellido2']);
    $email = test_input($_POST['email']);
    $sexo = test_input($_POST['sexo']);

    if (isset($_POST['borrar']))  {
        borrar();
    }

    fichero($cadena = $nombre.", ".$apellido1." ".$apellido2.", ".$email.", ".$sexo);
    imprimir();

?>