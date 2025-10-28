<HTML>
<HEAD><TITLE> 4.1 </TITLE></HEAD>
<BODY>
    <div style="text-align: center;">
        <h1>Calculadora</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="o1">Operando 1: </label>
            <input type="number" id="o1" name="o1" required>
            <br><br><br>
            <label for="o2">Operando 2: </label>
            <input type="number" id="o2" name="o2" required>
            <br><br>
            <div style="margin-left: 40%; text-align: left;">
                Seleccione una opcion:
                <br>
                <input type="radio" name="tipo" value="+" checked>Suma
                <br>
                <input type="radio" name="tipo" value="-">Resta
                <br>
                <input type="radio" name="tipo" value="*">Multiplicacion
                <br>
                <input type="radio" name="tipo" value="/">Division
            </div>
            <button type="submit" name="submit" value="submit">Enviar</button>
            <button type="reset" id="Borrar">Borrar</button>
        </form>
    </div>
<?php
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function suma($o1, $o2)  {
        return ($o1 + $o2);
    }  
    function resta($o1, $o2)  {
        return ($o1 - $o2);
    }
    function muliplicacion($o1, $o2)  {
        return ($o1 * $o2);
    }
    function divicion($o1, $o2)  {
        return ($o1 / $o2);
    }  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $o1 = test_input($_POST['o1']);
        $o2 = test_input($_POST['o2']);
        $tipo = test_input($_POST['tipo']);

        switch ($_POST['tipo'])  {
            case '+':
                $r = suma($o1, $o2); break;
            case '-':
                $r = resta($o1, $o2); break;
            case '*':
                $r = muliplicacion($o1, $o2); break;
            case '/':
                $r = divicion($o1, $o2); break;
        }
        echo '<div style="text-align: center;"><h1>Calculadora</h1><p>',$o1,' ',$tipo,' ',$o2,' = ',$r,'</p></div>';
    }
    
?>
</BODY>
</HTML>