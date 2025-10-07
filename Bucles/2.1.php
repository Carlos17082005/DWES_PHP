<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$num="168";

for ($i = 1; $i < 6; $i++)  {
    $format="Numero $num en binario = %08b <br>";
    echo sprintf($format, $num);
    $num=rand(1, 255);
}

?>
</BODY>
</HTML>