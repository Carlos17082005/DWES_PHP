<HTML>
<HEAD><TITLE> EJ8A – FUNCIONES ARRAYS</TITLE></HEAD>
<BODY>
<?php
$a = array('Carlos' => 10, 'Alvaro' => 2, 'Samuel' => 4, 'Emilio' => 6, 'Miguel' => 8);

echo "Mayor nota: ".max($a)."<br>";

echo "Menor nota: ".min($a)."<br>";

$suma = 0;
foreach($a as $value)  {
    $suma += $value;
}
echo "Media: ".$suma/count($a);

?>
</BODY>
</HTML>