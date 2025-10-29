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
            <label for="fichero">Fichero (Path/nombre): </label>
            <input type="text" id="fichero" name="fichero">
            <br><br>
            <label for="operaciones">Operaciones: </label><br>
            <input type="radio" id="mostrar" name="mostrar" value="todo" checked>
            <label for="mostrar">Mostrar fichero</label><br>

            <input type="radio" id="mostrar" name="mostrar" value="linea">
            <label for="mostrar">Mostrar linea <input type="number" id="linea" name="linea" min="0"> fichero</label><br>

            <input type="radio" id="mostrar" name="mostrar" value="lineas">
            <label for="mostrar">Mostrar <input type="number" id="lineas" name="lineas" min="0"> primeras lineas</label><br>
            <br>
            <button type="submit" id="Enviar">Enviar</button>
            <button type="reset" id="reset">Borrar</button><br><br>
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

    function imprimirTodo($f1)  {
        echo implode("<br>", $f1);
    }

    function imprimirLinea($f1, $linea)  {
        echo $f1[$linea];
    }

    function imprimirLineas($f1, $lineas)  {
        for ($i = 0; $i < $lineas; $i++)  {
            echo $f1[$i]."<br>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fichero = test_input($_POST['fichero']);
        $mostrar = test_input($_POST['mostrar']);
        if (isset($_POST['linea']))  {
            $linea = test_input($_POST['linea']);
        }
        if (isset($_POST['lineas']))  {
            $lineas = test_input($_POST['lineas']);
        }
                
        $f1 = (file("txt/$fichero"));

        switch ($mostrar)  {
            case "todo": imprimirTodo($f1); break;
            case "linea": imprimirLinea($f1, $linea); break;
            case "lineas": imprimirLineas($f1, $lineas); break;
        }
    }
?>
</html>