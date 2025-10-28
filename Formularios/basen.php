<?php
    $n = test_input($_POST['num']);
    $base = test_input($_POST['base']);

    $num = substr(strval($n), 0, strpos(strval($n), '/'));
    $numBase = substr(strval($n), strpos(strval($n), '/')+1, strlen(strval($n)));
    
    function convertir($num, $base1, $base2)  {
        return (base_convert($num, $base1, $base2));
    }
    
    echo '<div style="text-align: center;"><h1>Cambio de base</h1><p>Numero '.$num.' en base '.$numBase.' = '.convertir($num, $numBase, $base).' en base '.$base.'</p></div>';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>