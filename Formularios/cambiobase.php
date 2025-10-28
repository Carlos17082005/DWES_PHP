<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function binario($num)  {
        return ('<tr><td>Binario</td><td>'.decbin($num).'</td></tr>');
    }  
    function octal($num)  {
        return ('<tr><td>Octal</td><td>'.decoct($num).'</td></tr>');
    }
    function hexadecimal($num)  {
        return ('<tr><td>Hexadecimal</td><td>'.dechex($num).'</td></tr>');
    } 

    $tipo = test_input($_POST['tipo']);
    $num = test_input($_POST['num']);

    $r = '<style> table  { border: solid 1px; border-collapse: collapse;} tr, td, th  {border: solid 1px; border-collapse: collapse;}</style>';
    $r .= '<div style="margin-left: 40%"><table>';
    switch ($tipo)  {
        case 'B':
            $r .= binario($num); break;
        case 'O':
            $r .= octal($num); break;
        case 'H':
            $r .= hexadecimal($num); break;
        case 'T':
            $r .= binario($num).octal($num).hexadecimal($num); break;
    }
   echo $r.'<table></div>';

?>