<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$num="5";
$resultado = $num;

for ($i = ($num-1); $i > 0; $i--)  {
     $resultado = $resultado*$i;
}
echo "$resultado";

?>
</BODY>
</HTML>