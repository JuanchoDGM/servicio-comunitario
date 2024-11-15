<?php
include 'includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preescolar - Lista de Alumnos</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Lista de Alumnos</h1>

    <nav>
        <a href="index.php">Lista de Alumnos</a> |
        <a href="inscribir.php">Inscribir Nuevo Alumno</a>
    </nav>

    <table>
        <thead>
            <tr>
                <th>N°</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Nacimiento</th>
                <th>Grupo</th>
                <th>Cédula escolar</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT alumnos.id, alumnos.nombres, alumnos.apellidos, alumnos.fecha_nacimiento, alumnos.grupo, alumnos.cedula_escolar
                    FROM alumnos";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nombres"] . "</td>";
                    echo "<td>" . $row["apellidos"] . "</td>";
                    echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                    echo "<td>" . $row["grupo"] . "</td>";
                    echo "<td>" . $row["cedula_escolar"] . "</td>";
                    echo "<td style='font-size: 1.5rem;'><a href='eliminar.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este estudiante?\")'><ion-icon name='trash-outline'></ion-icon></a>

                        <a href='modificar.php?id=" . $row["id"] . "'><ion-icon name='create-outline'></ion-icon></a>
                        <a href='ver_mas.php?id=" . $row["id"] . "'><ion-icon name='add-circle-outline'></ion-icon></a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No hay alumnos registrados.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>