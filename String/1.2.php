<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ipInicial="192.18.16.204";
$ip=$ipInicial;

$primer=str_pad(decbin(substr($ip,0,strpos($ip, "."))), 8, "0", STR_PAD_LEFT);
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$segundo=str_pad(decbin(substr($ip,0,strpos($ip, "."))), 8, "0", STR_PAD_LEFT);
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$tercero=str_pad(decbin(substr($ip,0,strpos($ip, "."))), 8, "0", STR_PAD_LEFT);
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$cuarto=str_pad(decbin($ip), 8, "0", STR_PAD_LEFT);

echo "La IP $ipInicial se representa en binario como $primer.$segundo.$tercero.$cuarto";

?>
</BODY>
</HTML>