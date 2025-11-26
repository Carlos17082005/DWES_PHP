<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD ComprasWeb</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Almacenar producto</h1>
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
            <label for="almacen">Numero del almacen: </label>
            <select name="almacen" id="almacen" required>
            <?php
                try {
                    desplegableAlmacen($conn);
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            ?>
            </select><br><br>
            <label for="cantidad">Cantidad del producto: </label>
            <input type="number" id="cantidad" name="cantidad" min="0" step="1" required>
            <br><br>
            
            <button type="submit" id="Enviar">Enviar</button>
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

        function desplegableAlmacen($conn)  {
            $stmt = $conn->prepare("SELECT num_almacen, localidad FROM almacen");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                echo '<option value="'.$row['num_almacen'].'">'.$row['num_almacen'].' ('.$row['localidad'].')</option><br>';
            }
        }

        function almacena($conn, $almacen, $id_p, $cantidad)  {
            $sql = $conn->prepare("INSERT INTO almacena (num_almacen, id_producto, cantidad) VALUES (:almacen, :id_p, :cantidad);");
            $sql->bindParam(':almacen', $almacen);
            $sql->bindParam(':id_p', $id_p);
            $sql->bindParam(':cantidad', $cantidad);
            $sql->execute();
            echo '<p style="text-align: center;">Añadido correctamente</p>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $almacen = test_input($_POST['almacen']);
            $id_p = test_input($_POST['producto']);
            $cantidad = test_input($_POST['cantidad']);

            try {
                almacena($conn, $almacen, $id_p, $cantidad);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    ?>
</body>
</html>