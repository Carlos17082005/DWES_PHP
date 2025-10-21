<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.4</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Cambio de base</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="num">Numero: </label>
            <input type="float" id="num" name="num" required>
            <br><br>
            <label for="base">Base: </label>
            <input type="number" id="base" name="base" required>
            <br><br>
            <button type="submit" id="Enviar">Cambio de base</button>
            <button type="reset" id="Borrar">Borrar</button>
        </form>
    </div>
    <?php
        function convertir($num, $base1, $base2)  {
            return (base_convert($num, $base1, $base2));
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num = substr(strval($_POST['num']), 0, strpos(strval($_POST['num']), '/'));
            $numBase = substr(strval($_POST['num']), strpos(strval($_POST['num']), '/')+1, strlen(strval($_POST['num'])));
            echo '<div style="text-align: center;"><p>Numero '.$num.' en base '.$numBase.' = '.convertir($num, $numBase, $_POST['base']).' en base '.$_POST['base'].'</p></div>';
        }
    ?>
</body>
</html>