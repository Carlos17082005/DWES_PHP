<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>5.2</title>
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        function cadena()  {
            $d = '##';
            $cadena = "";
            $cadena = $_POST['nombre'].$d.$_POST['apellido1'].$d.$_POST['apellido2'].$d.$_POST['fecha'].$d.$cadena .= $_POST['loc'];
            return $cadena;
        }
        
        $f1=fopen("txt/alumnos2.txt","a+");
        fwrite($f1,(cadena()."\n"));
        fclose($f1);
    }
?>
</html>