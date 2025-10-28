<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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

    $o1 = test_input($_POST['o1']);
    $o2 = test_input($_POST['o2']);
    $tipo = test_input($_POST['tipo']);

    switch ($_POST['tipo'])  {
        case '+':
            $r = suma($o1, $o2); break;
        case '-':
            $r = resta($o1, $o2); break;
        case '*':
            $r = muliplicacion($o1, $o2); break;
        case '/':
            $r = divicion($o1, $o2); break;
    }
    echo '<div style="text-align: center;"><h1>Calculadora</h1><p>',$o1,' ',$tipo,' ',$o2,' = ',$r,'</p></div>';

?>