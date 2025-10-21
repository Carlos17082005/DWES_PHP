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
            width: 35px;
        }
    </style>";



for ($i = 0; $i < 4; $i++)  {
    for ($j = 0; $j < 10; $j++)  {
        $a[$i][$j] = rand(0, 10);
    }
}

echo "<table>";
foreach($a as $array)  {    
    echo "<tr>";
    foreach($array as $value)  {
        echo "<td>$value</td>";
    }
    echo "</tr>";    
}
echo "</table>";

$minNota = ""; $maxNota = "";
$max = 0; $min = 11;      
for ($i = 0; $i < count($a); $i++)  {
    if ($a[$i][1] > $max)  {
        $max = $a[$i][1];
        $maxNota = "Asintura con nota mas alta del alumno 1: $i";
    }
    if ($a[$i][1]  < $min)  {
        $min = $a[$i][1];
        $minNota = "Asintura con nota mas baja del alumno 1: $i";
    }
}

echo "<br>Mayor nota de 0 asignatura: ".max($a[0]);
echo "<br>Mayor nota de 3 asignatura: ".min($a[3]);
echo "<br>".$minNota;
echo "<br>".$maxNota;

$mediaAsig = array();
for ($i = 0; $i < count($a); $i++)  {
    $suma = 0;
    for ($j = 0; $j < count($a[0]); $j++)  {
        $suma += $a[$i][$j];
    }
    $mediaAsig[] = ($suma/10);
}
echo "<br>Nota media por asignatura: "; var_dump($mediaAsig);

$mediaAlum = array();
for ($i = 0; $i < count($a[0]); $i++)  {
    $suma = 0;
    for ($j = 0; $j < count($a); $j++)  {
        $suma += $a[$j][$i];
    }
    $mediaAlum[] = ($suma/4);
}
echo "Nota media por alumno: "; var_dump($mediaAlum);

?>
</BODY>
</HTML>