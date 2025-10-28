<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.2</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Conversor binario</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="o1">Numero decimal: </label>
            <input type="number" id="num" name="num" required>
            <br><br><br>
            <button type="submit" id="Enviar">Enviar</button>
            <button type="reset" id="Borrar">Borrar</button>
        </form>
    </div>
    <?php
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        function mensaje ($num)  {
            echo '<div style="text-align: center;"><h1>Resultado</h1><p>',decbin($num),'</p></div>';
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = test_input($_POST['num']);
            mensaje($num);
        }
    ?>
</body>
</html>