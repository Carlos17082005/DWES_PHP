<HTML>
<HEAD><TITLE> EJ1B - ARRAY MULDIMENCIONAL</TITLE></HEAD>
<BODY>
<?php
$a = array(
    array(2, 4, 6, 9, 7),
    array(8, 10, 12, 1, 12),
    array(14, 16, 88, 3, 15)
);

echo "<style>
        table  {
            border: 1px, solid;
            border-collapse: collapse;
        }
        tr, td, th  {
            border: 1px, solid;
            border-collapse: collapse;
        }
    </style>";

$max = 0;$pos;
echo "<br><table>";
for ($i = 0; $i < count($a); $i++)  {
    echo "<tr>";
    for ($j = 0; $j < count($a[0]); $j++)  {
        if ($a[$i][$j] > $max)  {
            $max = $a[$i][$j];
            $pos = "Elemento mayor ". $a[$i][$j] ." Fila ".($i+1).", columna ".($j+1);
        }
        echo "<td>".$a[$i][$j]."</td>";
    }
    echo "</tr>";
}
echo "</table><br>";
echo $pos;
?>
</BODY>
</HTML>