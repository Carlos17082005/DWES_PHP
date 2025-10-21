<?php
    function suma($o1, $o2)  {
        return ($o1 + $o2);
    }  
    function resta($o1, $o2)  {
        return ($o1 - $o2);
    }
    function muliplicacion($o1, $o2)  {
        return ($o1 * $o2);
    }
    function divicion($o1, $o2)  {
        return ($o1 / $o2);
    }  
    switch ($_POST['tipo'])  {
        case '+':
            $r = suma($_POST['o1'], $_POST['o2']); break;
        case '-':
            $r = resta($_POST['o1'], $_POST['o2']); break;
        case '*':
            $r = muliplicacion($_POST['o1'], $_POST['o2']); break;
        case '/':
            $r = divicion($_POST['o1'], $_POST['o2']); break;
    }
   echo '<div style="text-align: center;"><h1>Calculadora</h1><p>',$_POST['o1'],' ',$_POST['tipo'],' ',$_POST['o2'],' = ',$r,'</p></div>';

?>