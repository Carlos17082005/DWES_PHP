<HTML>
<HEAD><TITLE> EJ1B - ARRAY MULDIMENCIONAL</TITLE></HEAD>
<BODY>
<?php
$a = array(
    array(2, 4, 6),
    array(8, 10, 12),
    array(14, 16, 18)
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

echo "<table><tr>";
foreach($a as $array)  {    
    $sumaC = 0;
    foreach($array as $value)  {
        $sumaC += $value;
    }
    echo "<td>$sumaC</td></tr>";
}
echo "</table>";

echo "<table><tr>";
for ($i = 0; $i < count($a); $i++)  {
    $sumaF = 0;
    for ($j = 0; $j < count($a[0]); $j++)  {
        $sumaF += $a[$j][$i];
    }
    echo "<td>$sumaF</td>";
}
echo "</tr></table>";

?>
</BODY>
</HTML>