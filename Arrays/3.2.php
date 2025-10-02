<HTML>
<HEAD><TITLE> EJ2A – MEDIA POSICIONES PARES Y POSICIONES IMPARES</TITLE></HEAD>
<BODY>
<?php
$impares = array();

$contador = 0; 
$num = 1;
while ($contador < 20)  {
     if ($num % 2 != 0)  {
          $impares[] = $num;
          $contador++;
     }
     $num++;
}

$sumaPar = 0;
$sumaImpar = 0;
echo "<table border=1>";
echo "<tr>";
    echo "<td><b>Indice</b></td>";
    echo "<td><b>Valor</b></td>";
echo "</tr>";

for ($i = 0; $i < count($impares); $i++)  {
    echo "<tr>";
          echo "<td>$i</td>";
          echo "<td>$impares[$i]</td>";
          if ($i % 2 == 0)  {
            $sumaPar += $impares[$i];
          }
          else  {
            $sumaImpar += $impares[$i];
          }
    echo "</tr>";
}
echo "</table>";

echo "Media de las posiciones pares = $sumaPar<br>";
echo "Media de las posiciones pares = $sumaImpar";

?>
</BODY>
</HTML>