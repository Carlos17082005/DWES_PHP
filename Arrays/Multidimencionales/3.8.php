<HTML>
<HEAD><TITLE> EJ1B - ARRAY MULDIMENCIONAL</TITLE></HEAD>
<BODY>
<?php
$a = array();
$b = array();

for ($i = 0; $i < 3; $i++)  {
    for ($j = 0; $j < 3; $j++)  {
        $a[$i][$j] = rand(0, 10);
        $b[$i][$j] = rand(0, 10);
    }
}

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
echo "</table><br>";

echo "<table>";
foreach($b as $array)  {    
    echo "<tr>";
    foreach($array as $value)  {
        echo "<td>$value</td>";
    }
    echo "</tr>";    
}
echo "</table><br><hr>";


echo "<table>";
for ($i = 0; $i < 3; $i++)  {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++)  {
        echo "<td>".($a[$i][$j]+$b[$i][$j])."</td>";
    }
    echo "</tr>";
}
echo "</table><br>";

echo "<table>";
for ($i = 0; $i < 3; $i++)  {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++)  {
        $s = 0;
        for ($k = 0; $k < 3; $k++)  {
            $s += ($a[$i][$k]*$b[$k][$j]);
        }
        echo "<td>".$s."</td>";
    }
    echo "</tr>";
}
echo "</table>";


?>
</BODY>
</HTML>