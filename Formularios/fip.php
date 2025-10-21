<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4.4</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>IPs</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="ip">Numero: </label>
            <input type="num" id="ip" name="ip" required>
            <br><br>
            <button type="submit" id="Enviar">Notacion Binario</button>
            <button type="reset" id="Borrar">Borrar</button>
        </form>
    </div>
    <?php
        function extraer($ip)  {
            $primer=(int)substr($ip,0,strpos($ip, "."));
            $ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

            $segundo=(int)substr($ip,0,strpos($ip, "."));
            $ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

            $tercero=(int)substr($ip,0,strpos($ip, "."));
            $ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

            $cuarto=(int)$ip;

            if ($primer > 255 or $segundo > 255 or $tercero > 255 or $cuarto > 255)  {
                echo 'IP no valida';
            }
            else  {
                $format = "IP binario: %08b.%08b.%08b.%08b";
                echo sprintf($format, $primer, $segundo, $tercero, $cuarto);
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo '<div style="text-align: center;"><br><br>';
            extraer($_POST['ip']);
            echo '</div>';
        }
    ?>
</body>
</html>