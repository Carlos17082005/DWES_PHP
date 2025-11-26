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
        <h1>Stock</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Nombre del producto: </label>
            <select name="producto" id="producto" required>
            <?php
                try {
                    $conn = conexionBD();
                    desplegableProducto($conn);
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

        function desplegableProducto($conn)  {
            $stmt = $conn->prepare("SELECT id_producto, nombre FROM producto");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                echo '<option value="'.$row['id_producto'].'">'.$row['nombre'].'</option><br>';
            }
        }

        function stock($conn, $id_p)  {
            $stmt = $conn->prepare("select num_almacen, cantidad from almacena where id_producto = :id_p and cantidad != 0 order by cantidad DESC;");
            $stmt->bindParam(':id_p', $id_p);
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            echo '<div style="text-align: center; display: flex; justify-content: center; align-items: center;">';
            echo '<table><th>Almacen</th><th>Cantidad</th>';
            foreach($resultado as $row) {
                echo '<tr><td>'.$row['num_almacen'].'</td><td>'.$row['cantidad'].'</td></tr>';
            }
            echo '<table></div>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_p = test_input($_POST['producto']);

            try {
                stock($conn, $id_p);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    ?>
</body>
</html>