<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD ComprasWeb</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Crear Almacen</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="loc">Localidad del almacen: </label>
            <input type="text" id="loc" name="loc" maxlength="40" required>
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

        function crearAlmacen($conn, $loc)  {
                $stmt = $conn->prepare("SELECT max(num_almacen) as max FROM almacen");
                $stmt->execute();

                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $resultado=$stmt->fetchAll();
                foreach($resultado as $row) {
                    $num = $row['max'];
                }
                $num = $num + 1;
                $sql = $conn->prepare("INSERT INTO almacen (num_almacen, localidad) VALUES (:num,:localidad)");
                $sql->bindParam(':num', $num);
                $sql->bindParam(':localidad', $loc);
                $sql->execute();
                echo '<p style="text-align: center;">Creado correctamente</p>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $loc = test_input($_POST['loc']);

            try {
                $conn = conexionBD();
                crearAlmacen($conn, $loc);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    ?>
</body>
</html>