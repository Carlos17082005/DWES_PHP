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
            <label for="dni">DNI del empleado: </label>
            <input type="text" id="dni" name="dni" maxlength="9" required>
            <br><br>
            <label for="name">Nombre del empleado: </label>
            <input type="text" id="name" name="name" maxlength="40" required>
            <br><br>
            <label for="apellidos">Apellidos del empleado: </label>
            <input type="text" id="apellidos" name="apellidos" maxlength="40" required>
            <br><br>
            <label for="fecha">Fecha de nacimiento: </label>
            <input type="date" id="fecha" name="fecha" required>
            <br><br>
            <label for="sal">Salario del empleado: </label>
            <input type="number" id="sal" name="sal" step="0,01" required>
            <br><br>
            <label for="dpto">Departamento: </label>
            <select name="dpto" id="dpto" required>
            <?php
                try {
                    $conn = conexionBD();
                    desplegableDepartamento($conn);
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

        function desplegableDepartamento($conn)  {
            $stmt = $conn->prepare("SELECT cod_dpto, nombre_dpto FROM departamento");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $resultado=$stmt->fetchAll();
            foreach($resultado as $row) {
                echo '<option value="'.$row['cod_dpto'].'">'.$row['nombre_dpto'].'</option><br>';
            }
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

        function añadirEmpleado($conn, $dni, $nombre, $apellidos, $fecha, $salario)  {
            $sql = $conn->prepare("INSERT INTO empleado (dni, nombre, apellidos, fecha_nac, salario) VALUES (:dni,:nombre,:apellidos,:fecha,:sal)");
            $sql->bindParam(':dni', $dni);
            $sql->bindParam(':nombre', $nombre);
            $sql->bindParam(':apellidos', $apellidos);
            $sql->bindParam(':fecha', $fecha);
            $sql->bindParam(':sal', $salario);
            $sql->execute();
            echo '<p style="text-align: center;">Añadido correctamente</p>';
        }

        function emple_depart($conn, $dni, $cod_dpto, $fecha_ini)  {
            $sql = $conn->prepare("INSERT INTO emple_depart (dni, cod_dpto, fecha_ini) VALUES (:dni,:cod,:fecha)");
            $sql->bindParam(':dni', $dni);
            $sql->bindParam(':cod', $cod_dpto);
            $sql->bindParam(':fecha', $fecha_ini);
            $sql->execute();
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $dni = test_input($_POST['dni']);
            $nombre = test_input($_POST['name']);
            $apellidos = test_input($_POST['apellidos']);
            $fecha = test_input($_POST['fecha']);
            $salario = doubleval(test_input($_POST['sal']));
            $departamento = test_input($_POST['dpto']);

            try {
                $conn = conexionBD();
                $conn->beginTransaction();
                añadirEmpleado($conn, $dni, $nombre, $apellidos, $fecha, $salario);
                emple_depart($conn, $dni, $departamento, date("Y-m-d"));
                $conn->commit();
            }
            catch(PDOException $e) {
                $conn->rollBack();
                if ($e->getCode() == 23000)  {
                    echo "Error, la clave primaria esta duplicada <br>";
                }
                else  {
                    echo "Error: " . $e->getMessage() . "<br>";
                    echo "Código de error: " . $e->getCode() . "<br>";
                }
            }
            $conn = null;
        }
    ?>
</body>
</html>