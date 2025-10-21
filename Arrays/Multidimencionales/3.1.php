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
echo "<table>
        <tr>
            <th></th>
            <th>col 1</th>
            <th>col 2</th>
            <th>col 3</th>
        </tr>";
$contador = 1;
foreach($a as $array)  {    
    echo "<tr><th>Fila $contador</th>";
    foreach($array as $value)  {
        echo "<th>$value</th>";
    }
    echo "</tr>";
    $contador += 1;
}
echo "</table>";

?>
</BODY>
</HTML>