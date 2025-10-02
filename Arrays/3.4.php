<HTML>
<HEAD><TITLE> EJ4A – NÚMEROS BINARIOS INVERSOS</TITLE></HEAD>
<BODY>
<?php
$binario = array();

for ($i = 0; $i < 20; $i++)  {
    $binario[] = decbin($i);
}

$inverso = array();
for ($i = count($binario); $i > 0; $i--)  {
    $inverso[] = $binario[$i-1];
}

$suma = 0;
echo "<table border=1>";
echo "<tr>";
    echo "<td><b>Indice</b></td>";
    echo "<td><b>Binario</b></td>";
    echo "<td><b>Inverso</b></td>";
echo "</tr>";

for ($i = 0; $i < count($binario); $i++)  {
    echo "<tr>";
          echo "<td>$i</td>";
          echo "<td>$binario[$i]</td>";
          echo "<td>$inverso[$i]</td>";
    echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>