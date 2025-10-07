<HTML>
<HEAD><TITLE> EJ7A – FUNCIONES ARRAYS ASOSIATIVOS</TITLE></HEAD>
<BODY>
<?php
$a = array('Carlos' => 20, 'Alvaro' => 19, 'Samuel' => 28, 'Emilio' => 18, 'Miguel' => 21);

foreach($a as $value)  {
    echo $value."<br>";
}

$claves = array_keys($a);
$sp = $claves[1];
echo "Segunda posicion: ".$a[$sp]."<br>";

echo "Siguiente posicion: ".next($a)."<br>";

echo end($a)."<br>";

asort($a);
foreach($a as $value)  {
    echo $value."<br>";
}

?>
</BODY>
</HTML>