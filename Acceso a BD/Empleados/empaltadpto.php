<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD ComprasWeb</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Crear departamento</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Nombre del departamento: </label>
            <input type="text" id="name" name="name" maxlength="40" required>
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
            $dbname = "empleados";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }

        function añadirDepartamento($conn, $nombre)  {
            $stmt = $conn->prepare("SELECT max(cod_dpto) as cod FROM departamento");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                $id = $row['cod'];
            }
            $id = 'D'.str_pad((intval(substr($id, 1)) + 1), 3, "0", STR_PAD_LEFT);
            $sql = $conn->prepare("INSERT INTO departamento (cod_dpto, nombre_dpto) VALUES (:cod,:nombre)");
            $sql->bindParam(':cod', $id);
            $sql->bindParam(':nombre', $nombre);
            $sql->execute();
            echo '<p style="text-align: center;">Añadido correctamente</p>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = test_input($_POST['name']);

            try {
                $conn = conexionBD();
                $conn->beginTransaction();
                añadirDepartamento($conn, $nombre);
                $conn->commit();
            }
            catch(PDOException $e) {
                $conn->rollBack();
                echo "Error: " . $e->getMessage() . "<br>";
                echo "Código de error: " . $e->getCode() . "<br>";
            }
            $conn = null;
        }
    ?>
</body>
</html>