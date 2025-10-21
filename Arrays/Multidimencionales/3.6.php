<HTML>
<HEAD><TITLE> EJ1B - ARRAY MULDIMENCIONAL</TITLE></HEAD>
<BODY>
<?php
$a = array();

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



for ($i = 0; $i < 3; $i++)  {
    for ($j = 0; $j < 3; $j++)  {
        $a[$i][$j] = rand(0, 9);
    }
}

$m = array(); $s = array();
echo "<table>";
foreach($a as $array)  { 
    $max = 0; $suma = 0;   
    echo "<tr>";
    foreach($array as $value)  {
        if ($value > $max)  {
            $max = $value;
        }
        $suma += $value;
        echo "<td>$value</td>";
    }
    $m[] = $max;
    $s[] = ($suma/3);
    echo "</tr>";    
}
echo "</table>";

var_dump($m);
var_dump($s);

?>
</BODY>
</HTML>