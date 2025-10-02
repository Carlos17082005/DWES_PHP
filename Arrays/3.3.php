<HTML>
<HEAD><TITLE> EJ3A – 20 PRIMEROS NÚMEROS BINARIOS</TITLE></HEAD>
<BODY>
<?php
$binario = array();

for ($i = 0; $i < 20; $i++)  {
    $binario[] = decbin($i);
}

$suma = 0;
echo "<table border=1>";
echo "<tr>";
    echo "<td><b>Indice</b></td>";
    echo "<td><b>Binario</b></td>";
    echo "<td><b>Octal</b></td>";
echo "</tr>";

for ($i = 0; $i < count($binario); $i++)  {
    echo "<tr>";
          echo "<td>$i</td>";
          echo "<td>$binario[$i]</td>";
          echo "<td>".decoct($i)."</td>";
    echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>