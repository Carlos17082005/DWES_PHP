<?php
    $num = substr(strval($_POST['num']), 0, strpos(strval($_POST['num']), '/'));
    $numBase = substr(strval($_POST['num']), strpos(strval($_POST['num']), '/')+1, strlen(strval($_POST['num'])));
    
    function convertir($num, $base1, $base2)  {
        return (base_convert($num, $base1, $base2));
    }
    
    echo '<div style="text-align: center;"><h1>Cambio de base</h1><p>Numero '.$num.' en base '.$numBase.' = '.convertir($num, $numBase, $_POST['base']).' en base '.$_POST['base'].'</p></div>';

?>