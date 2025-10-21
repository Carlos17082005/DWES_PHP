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

echo "<table>";
foreach($a as $array)  {    
    echo "<tr>";
    foreach($array as $value)  {
        echo "<td>$value</td>";
    }
    echo "</tr>";    
}
echo "</table>";

echo "<br><table>";
for ($i = 0; $i < count($a[0]); $i++)  {
    echo "<tr>";
    for ($j = 0; $j < count($a); $j++)  {
        echo "<td>".$a[$j][$i]."</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>