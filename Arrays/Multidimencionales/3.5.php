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



echo "<br><table>";
for ($i = 0; $i < 3; $i++)  {
    echo "<tr>";
    for ($j = 0; $j < 5; $j++)  {
        echo "<td>".($i+$j)."</td>";
    }
    echo "</tr>";
}
echo "</table>";

?>
</BODY>
</HTML>