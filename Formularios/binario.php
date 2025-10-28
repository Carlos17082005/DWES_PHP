<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $num = test_input($_POST['num']);

    function mensaje ($num)  {
        echo '<div style="text-align: center;"><h1>Resultado</h1><p>',decbin($num),'</p></div>';
    }
    mensaje($num);
?>
