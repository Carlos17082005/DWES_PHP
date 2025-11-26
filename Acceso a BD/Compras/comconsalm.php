<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD ComprasWeb</title>
    <style>
        table  {
            border: solid 1px;
            border-collapse: collapse;
        }
        tr, td, th  {
            border: solid 1px;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h1>Stock almacenes</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Almacen: </label>
            <select name="almacen" id="almacen" required>
            <?php
                try {
                    $conn = conexionBD();
                    desplegableAlmacen($conn);
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            ?>
            </select><br><br>
            
            <button type="submit" id="Enviar">Enviar</button>
            <button type="reset" id="Borrar">Borrar</button>
            <br><br>
        </form>
    </div>
    <?php
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function conexionBD()  {
            $servername = "localhost";
            $username = "root";
            $password = "rootroot";
            $dbname = "comprasweb";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }

        function desplegableAlmacen($conn)  {
            $stmt = $conn->prepare("SELECT num_almacen, localidad FROM almacen");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                echo '<option value="'.$row['num_almacen'].'">'.$row['num_almacen'].' ('.$row['localidad'].')</option><br>';
            }
        }

        function stock($conn, $almacen)  {
            $stmt = $conn->prepare("select nombre, cantidad from almacena a, producto p where a.id_producto = p.id_producto and num_almacen = :almacen order by a.id_producto ASC;");
            $stmt->bindParam(':almacen', $almacen);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            echo '<div style="text-align: center; display: flex; justify-content: center; align-items: center;">';
            echo '<table><th>Almacen</th><th>Cantidad</th>';
            foreach($resultado as $row) {
                echo '<tr><td>'.$row['nombre'].'</td><td>'.$row['cantidad'].'</td></tr>';
            }
            echo '<table></div>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $almacen = test_input($_POST['almacen']);

            try {
                stock($conn, $almacen);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    ?>
</body>
</html>