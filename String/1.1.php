<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
$ipInicial="192.18.16.204";
$ip=$ipInicial;

$primer=substr($ip,0,strpos($ip, "."));
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$segundo=substr($ip,0,strpos($ip, "."));
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$tercero=substr($ip,0,strpos($ip, "."));
$ip = substr($ip,strpos($ip, ".")+1, strlen($ip));

$cuarto=$ip;

$format = "La IP $ipInicial se representa en binario como %08b.%08b.%08b.%08b";
echo sprintf($format, $primer, $segundo, $tercero, $cuarto);
?>
</BODY>
</HTML>