<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$numBase="48";
$num=$numBase;
$base="8";
$cadena = (string) "";

while ($num / $base != 0)  {
    $cadena = ($num % $base).$cadena;
    $num=intdiv($num,$base);
}
echo "Numero $numBase en base $base = $cadena";

?>
</BODY>
</HTML>