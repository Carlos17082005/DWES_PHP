<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD ComprasWeb</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Crear producto</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Nombre del producto: </label>
            <input type="text" id="name" name="name" maxlength="40" required>
            <br><br>
            <label for="precio">Precio del producto: </label>
            <input type="number" id="precio" name="precio" min="0" step="0.01" required>
            <br><br>
            <label for="categoria">Categoria del producto: </label>
            <select name="categoria" id="categoria" required>
            <?php
                try {
                    $conn = conexionBD();
                    desplegableCategoria($conn);
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            ?>
            </select><br><br>
            
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

        function desplegableCategoria($conn)  {
            $stmt = $conn->prepare("SELECT id_categoria, nombre FROM categoria");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                echo '<option value="'.$row['id_categoria'].'">'.$row['nombre'].'</option><br>';
            }
        }

        function añadirProducto($conn, $nombre, $precio, $id_c)  {
            $stmt = $conn->prepare("SELECT max(id_producto) as max_id FROM producto");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                $id = $row['max_id'];
            }
            $id = 'P'.str_pad((intval(substr($id, 1)) + 1), 4, "0", STR_PAD_LEFT);
            $sql = $conn->prepare("INSERT INTO producto (id_producto, nombre, precio, id_categoria) VALUES (:id_p, :nombre, :precio, :id_c);");
            $sql->bindParam(':id_p', $id);
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':precio', $precio);
            $sql->bindParam(':id_c', $id_c);
            $sql->execute();
            echo '<p style="text-align: center;">Añadido correctamente</p>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = test_input($_POST['name']);
            $precio = doubleval(test_input($_POST['precio']));
            $id_c = test_input($_POST['categoria']);

            try {
                añadirProducto($conn, $nombre, $precio, $id_c);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    ?>
</body>
</html>