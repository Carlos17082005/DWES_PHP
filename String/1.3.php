<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ipInicial="192.168.16.100/16";
$ip=$ipInicial;

$bitMascara=substr($ip,strpos($ip, "/")+1, strlen($ip));
$mascara="";
$mascara=str_pad($mascara, $bitMascara, "1", STR_PAD_LEFT);
$mascara=str_pad($mascara, 32, "0", STR_PAD_RIGHT);
$pMascara=bindec(substr($mascara,0,8));
$sMascara=bindec(substr($mascara,8,-16));
$tMascara=bindec(substr($mascara,17,-8));
$cMascara=bindec(substr($mascara,25,32));
$mascara="$pMascara.$sMascara.$tMascara.$cMascara";

$ip = substr($ip,0,strpos($ip, "/"));
echo "IP: $ip <br>";

$primer=substr($ip,0,strpos($ip, "."));
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$segundo=substr($ip,0,strpos($ip, "."));
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$tercero=substr($ip,0,strpos($ip, "."));
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$cuarto=$ip;

$binario=decbin($primer).decbin($segundo).decbin($tercero).decbin($cuarto);

$Broadcast=str_pad(substr($binario,0,$bitMascara), 32, "1", STR_PAD_RIGHT);
$pBroadcast=bindec(substr($Broadcast,0,8));
$sBroadcast=bindec(substr($Broadcast,8,-16));
$tBroadcast=bindec(substr($Broadcast,16,-8));
$cBroadcast=bindec(substr($Broadcast,24,32));
$Broadcast="$pBroadcast.$sBroadcast.$tBroadcast.$cBroadcast";

$red=str_pad(substr($binario,0,$bitMascara), 32, "0", STR_PAD_RIGHT);
$pred=bindec(substr($red,0,8));
$sred=bindec(substr($red,8,-16));
$tred=bindec(substr($red,16,-8));
$cred=bindec(substr($red,24,32));
$red="$pred.$sred.$tred.$cred";

$rangoI=str_pad(substr($binario,0,$bitMascara), 31, "0", STR_PAD_RIGHT);
$rangoI=str_pad($rangoI, 32, "1", STR_PAD_RIGHT);
$prangoI=bindec(substr($rangoI,0,8));
$srangoI=bindec(substr($rangoI,8,-16));
$trangoI=bindec(substr($rangoI,16,-8));
$crangoI=bindec(substr($rangoI,24,32));
$rangoI="$prangoI.$srangoI.$trangoI.$crangoI";

$rangoS=str_pad(substr($binario,0,$bitMascara), 31, "1", STR_PAD_RIGHT);
$rangoS=str_pad($rangoS, 32, "0", STR_PAD_RIGHT);
$prangoS=bindec(substr($rangoS,0,8));
$srangoS=bindec(substr($rangoS,8,-16));
$trangoS=bindec(substr($rangoS,16,-8));
$crangoS=bindec(substr($rangoS,24,32));
$rangoS="$prangoS.$srangoS.$trangoS.$crangoS";


echo "Mascara: $mascara <br>";
echo "Direccion de Red: $red <br>";
echo "Direccion de Broadcast: $Broadcast <br>"; 
echo "Rango: $rangoI a $rangoS <br>"; 

?>
</BODY>
</HTML>
