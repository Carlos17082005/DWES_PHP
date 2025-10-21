<?php
    function mensaje ()  {
        echo '<div style="text-align: center;"><h1>Resultado</h1><p>',decbin($_POST['num']),'</p></div>';
    }
    mensaje();
?>
