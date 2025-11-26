<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BD ComprasWeb</title>
</head>
<body>
    <div style="text-align: center;">
        <h1>Crear categoria</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="name">Nombre de la categoria: </label>
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
            $dbname = "comprasweb";

            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }

        function añadirCategoria($conn, $nombre)  {
            $stmt = $conn->prepare("SELECT max(id_categoria) as max_id FROM categoria");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                $id = $row['max_id'];
            }
            $id = 'C-'.str_pad((intval(substr($id, 2)) + 1), 3, "0", STR_PAD_LEFT);
            $sql = $conn->prepare("INSERT INTO categoria (id_categoria, nombre) VALUES (:id,:nombre)");
            $sql->bindParam(':id', $id);
            $sql->bindParam(':nombre', $nombre);
            $sql->execute();
            echo '<p style="text-align: center;">Añadido correctamente</p>';
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = test_input($_POST['name']);

            try {
                $conn = conexionBD();
                añadirCategoria($conn, $nombre);
            }
            catch(PDOException $e) {
                echo "Error: " . $e->getMessage();
            }
            $conn = null;
        }
    ?>
</body>
</html>