<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$numBase="1515";
$num=$numBase;
$base="16";
$cadena = (string) "";

while ($num / $base != 0)  {
    switch ($num % $base)  {
        case 0:
        case 1: 
        case 2: 
        case 3: 
        case 4: 
        case 5: 
        case 6: 
        case 7: 
        case 8:
        case 9: 
            $cadena = ($num % $base).$cadena;  
            break;
        case 10:
            $cadena = "A".$cadena;
            break;
        case 11: 
            $cadena = "B".$cadena;
            break;
        case 12:
            $cadena = "C".$cadena;
            break;
        case 13:
            $cadena = "D".$cadena;
            break;
        case 14:
            $cadena = "E".$cadena;
            break;
        case 15:
            $cadena = "F".$cadena;
            break;
    }
   
    $num=intdiv($num,$base);
}
echo "Numero $numBase en base $base = $cadena";

?>
</BODY>
</HTML>