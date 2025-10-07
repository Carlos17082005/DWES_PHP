<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$num="8";

echo "<table border=1>";
for ($i = 1; $i < 11; $i++)  {
    echo "<tr>";
    echo "<td>$num x $i</td>";
    echo "<td>".($num*$i)."</td>";
    echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>