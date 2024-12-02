<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}
include 'includes/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preescolar - Lista de Alumnos</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/header.css">
    <style>
        *{
            box-sizing: border-box;
        }
        .actions{
            display: flex;
            justify-content: space-around;
            font-size: 1.5rem;
        }
        .actions a{
            background-color: #0d6efd;
            padding: 5px;
            border-radius: 30%;
            color: white;
            font-weight: bold;
            width: 40px;
            height: 40px;
            text-align: center;
        }
        .actions a:hover{
            background-color: #0a58ca;
        }
        .actions a#eliminar{
            background-color: #dc3545;
        }
        .actions a#eliminar:hover{
            background-color: #c82333;
        }
        .logout{
            background-color: rgba(255, 0, 0, 0.2);
            border: 1px red solid;
        }
        .logout:hover{
            background-color: rgba(255, 0, 0, 0.4);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <img style="height: 150px;" src="img/logo_marcelino.png" alt="Logo Institución">
        <h1>Lista de alumnos</h1>
    </header>
    <nav>
        <a href="index.php">Lista de Alumnos</a> |
        <a href="inscribir.php">Inscribir Nuevo Alumno</a> |
        <a class="logout" href="logout.php">Cerrar Sesión</a>
        
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
                    echo "<td class='actions'>

                            <a href='modificar.php?id=" . $row["id"] . "'><ion-icon name='create-outline'></ion-icon></a>

                            <a href='ver_mas.php?id=" . $row["id"] . "'><ion-icon name='add-circle-outline'></ion-icon></a>

                            <a id='eliminar' href='eliminar.php?id=" . $row["id"] . "' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este estudiante?\")'><ion-icon name='trash-outline'></ion-icon></a>

                        </td>";
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