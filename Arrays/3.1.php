<HTML>
<HEAD><TITLE> EJ1A – NUMEROS IMPARES</TITLE></HEAD>
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

$suma = 0;
echo "<table border=1>";
echo "<tr>";
    echo "<td><b>Indice</b></td>";
    echo "<td><b>Valor</b></td>";
    echo "<td><b>Suma</b></td>";
echo "</tr>";

for ($i = 0; $i < count($impares); $i++)  {
    echo "<tr>";
          echo "<td>$i</td>";
          echo "<td>$impares[$i]</td>";
          $suma += $impares[$i];
          echo "<td>$suma</td>";
    echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>