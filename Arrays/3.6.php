<HTML>
<HEAD><TITLE> EJ6A – JUNTAR ARRAYS, BORRAR E INVERTIR</TITLE></HEAD>
<BODY>
<?php
$a = array('Bases Datos', 'Entornos Desarrollo', 'Programación');
$b = array('Sistemas Informáticos','FOL','Mecanizado');
$c = array('Desarrollo Web ES','Desarrollo Web EC','Despliegue','Desarrollo Interfaces', 'Inglés');

$d = array_merge($a, $b, $c);
$eliminar = array_search('Mecanizado', $d);
array_splice($d, $eliminar, 1);

foreach($d as $value)  {
    echo $value."<br>";
}


?>
</BODY>
</HTML>