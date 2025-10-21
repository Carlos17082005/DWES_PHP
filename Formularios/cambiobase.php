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

    $r = '<style> table  { border: solid 1px; border-collapse: collapse;} tr, td, th  {border: solid 1px; border-collapse: collapse;}</style>';
    $r .= '<div style="margin-left: 40%"><table>';
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

?>