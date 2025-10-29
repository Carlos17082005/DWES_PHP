<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5.1</title>
</head>
<body>
    <div>
        <h1>Datos alumno</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" maxlength="40">
            <br><br>
            <label for="apellido1">Apellido 1: </label>
            <input type="text" id="apellido1" name="apellido1" maxlength="40">
            <br><br>
            <label for="apellido2">Apellido 2: </label>
            <input type="text" id="apellido2" name="apellido2" maxlength="40">
            <br><br>
            <label for="fecha">Fecha de nacimiento: </label>
            <input type="date" id="fecha" name="fecha">
            <br><br>
            <label for="loc">Localidad: </label>
            <input type="text" id="loc" name="loc" maxlength="36">
            <br><br>
            <button type="submit" id="Enviar">Enviar</button>
            <button type="reset" id="reset">Borrar formulario</button>
        </form>
    </div>
</body>

<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function fichero($cadena)  {
        $f1=fopen("txt/alumnos1.txt","a+");
        fwrite($f1,($cadena."\n"));
        fclose($f1);
    }

    function cadena($nombre, $apellido1, $apellido2, $fecha, $loc)  {
        $cadena = $nombre;
        $cadena = str_pad($cadena, 40, " ", STR_PAD_RIGHT);
        $cadena .= $apellido1;
        $cadena = str_pad($cadena, 81, " ", STR_PAD_RIGHT);
        $cadena .= $apellido2;
        $cadena = str_pad($cadena, 123, " ", STR_PAD_RIGHT);
        $cadena .= $fecha;
        $cadena = str_pad($cadena, 133, " ", STR_PAD_RIGHT);
        $cadena .= $loc;
        $cadena = str_pad($cadena, 160, " ", STR_PAD_RIGHT);
        return $cadena;
    }

    $nombre = ""; $apellido1 = ""; $apellido2 = ""; $fecha = ""; $loc = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = test_input($_POST['nombre']);
        $apellido1 = test_input($_POST['apellido1']);
        $apellido2 = test_input($_POST['apellido2']);
        $fecha = test_input($_POST['fecha']);
        $loc = test_input($_POST['loc']);
        
        fichero(cadena($nombre, $apellido1, $apellido2, $fecha, $loc));
    }
?>
</html>