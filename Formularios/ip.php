<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
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
    $ip = test_input($_POST['ip']);
    echo '<div style="text-align: center;"><h1>IPs</h1>';
    extraer($ip);
?>