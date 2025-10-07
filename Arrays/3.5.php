<HTML>
<HEAD><TITLE> EJ5A – JUNTAR ARRAYS</TITLE></HEAD>
<BODY>
<?php
$a = array('Bases Datos', 'Entornos Desarrollo', 'Programación');
$b = array('Sistemas Informáticos','FOL','Mecanizado');
$c = array('Desarrollo Web ES','Desarrollo Web EC','Despliegue','Desarrollo Interfaces', 'Inglés');

$d = array();
for ($i = 0; $i < count($a); $i++)  {
    $d[] = $a[$i];
}
for ($i = 0; $i < count($b); $i++)  {
    $d[] = $b[$i];
}
for ($i = 0; $i < count($c); $i++)  {
    $d[] = $c[$i];
}

$e = array_merge($a, $b, $c);

$f = array();
for ($i = 0; $i < count($a); $i++)  {
    array_push($f, $a[$i]);
}
for ($i = 0; $i < count($b); $i++)  {
    array_push($f, $b[$i]);
}
for ($i = 0; $i < count($c); $i++)  {
    array_push($f, $c[$i]);
}

?>
</BODY>
</HTML>