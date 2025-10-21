<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.3</title>
    <style>
        table  {
            border: solid 1px;
            border-collapse: collapse;
        }
        tr, td, th  {
            border: solid 1px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h1>Conversor Numerico</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="num">Numero decimal: </label>
            <input type="number" id="num" name="num" required>
            <br><br><br>
            <div style="margin-left: 40%; text-align: left;">
                Seleccione una opcion:
                <br><br>
                <input type="radio" name="tipo" value="B" checked>Binario
                <br>
                <input type="radio" name="tipo" value="O">Octal
                <br>
                <input type="radio" name="tipo" value="H">Hexadecimal
                <br>
                <input type="radio" name="tipo" value="T">Todos los sistemas
            </div><br>
            <button type="submit" id="Enviar">Enviar</button>
            <button type="reset" id="Borrar">Borrar</button>
        </form>
    </div><br><br>
    <?php
        function binario($num)  {
            return ('<tr><td>Binario</td><td>'.decbin($num).'</td></tr>');
        }  
        function octal($num)  {
            return ('<tr><td>Octal</td><td>'.decoct($num).'</td></tr>');
        }
        function hexadecimal($num)  {
            return ('<tr><td>Hexadecimal</td><td>'.dechex($num).'</td></tr>');
        } 

        $r = '<div style="margin-left: 40%"><table>';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        switch ($_POST['tipo'])  {
            case 'B':
                $r .= binario($_POST['num']); break;
            case 'O':
                $r .= octal($_POST['num']); break;
            case 'H':
                $r .= hexadecimal($_POST['num']); break;
            case 'T':
                $r .= binario($_POST['num']).octal($_POST['num']).hexadecimal($_POST['num']); break;
        }
        echo $r.'<table></div>';
        }
    ?>
</body>
</html>