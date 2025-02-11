<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
include 'includes/conexion.php';

// Verificar si se recibe el ID del alumno
if (isset($_GET['id'])) {
    $alumno_id = intval($_GET['id']);

    // Consultar datos del alumno
    $sql_alumno = "SELECT * FROM alumnos WHERE id = $alumno_id";
    $result_alumno = $conn->query($sql_alumno);
    $alumno = $result_alumno->fetch_assoc();

    // Consultar datos del padre
    $sql_padre = "SELECT * FROM padres WHERE alumno_id = $alumno_id";
    $result_padre = $conn->query($sql_padre);
    $padre = $result_padre->fetch_assoc();

    // Consultar datos de la madre
    $sql_madre = "SELECT * FROM madres WHERE alumno_id = $alumno_id";
    $result_madre = $conn->query($sql_madre);
    $madre = $result_madre->fetch_assoc();

    // Consultar datos del representante
    $sql_representante = "SELECT * FROM representantes WHERE alumno_id = $alumno_id";
    $result_representante = $conn->query($sql_representante);
    $representante = $result_representante->fetch_assoc();
} else {
    echo "ID del alumno no especificado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Alumno</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/header.css">
    <style>
        /* General Styles */
        body {
            background-color: #f4f6f9;
        }

        /* Container and Card Styles */
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
            color: navy;
        }

        .card {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 10px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            width: 100%;
            font-weight: bold;
            font-size: 1.2em;
            margin-bottom: 10px;
            color: navy;
        }

        .card-content {
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 15px;
            width: 100%;
        }

        .card-content div {
            flex: 1 1 calc(50% - 20px);
            margin-bottom: 10px;
            color: #333;
        }

        .card-content div strong {
            display: block;
            color: black;
            font-size: 0.95em;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 1em;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            color: #fff;
            background-color: navy;
        }

        .btn:hover {
            background-color: #000030;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <img style="height: 150px;" src="img/logo_marcelino.png" alt="Logo Institución">
        <h1>Información Completa del Alumno</h1>
    </header>
    <nav>
        <a href="index.php">Lista de Alumnos</a> |
        <a href="inscribir.php">Inscribir Nuevo Alumno</a> |
        <a class="logout" href="logout.php">Cerrar Sesión</a>

    </nav>

    <!-- Main Content -->
    <div class="container">

        <!-- Card Datos del Alumno -->
        <div class="card">
            <div class="card-header">Datos del Alumno</div>
            <div class="card-content">
                <div><strong>Nombre:</strong> <?= $alumno['nombres'] . ' ' . $alumno['apellidos'] ?></div>
                <div><strong>Cédula Escolar:</strong> <?= $alumno['cedula_escolar'] ?></div>
                <div><strong>Periodo a cursar:</strong> <?= $alumno['periodo'] ?></div>
                <div><strong>Fecha de Nacimiento:</strong> <?= $alumno['fecha_nacimiento'] ?></div>
                <div><strong>Lugar de Nacimiento:</strong> <?= $alumno['lugar_nacimiento'] ?></div>
                <div><strong>Procede de Hogar:</strong> <?= $alumno['procede_hogar'] ?></div>
                <div><strong>Procede de Otro Plantel:</strong> <?= $alumno['procede_plantel'] ?></div>
                <div><strong>Talla de Camisa:</strong> <?= $alumno['talla_camisa'] ?></div>
                <div><strong>Talla de Pantalón:</strong> <?= $alumno['talla_pantalon'] ?></div>
                <div><strong>Talla de Zapato:</strong> <?= $alumno['talla_zapato'] ?></div>
                <div><strong>Peso:</strong> <?= $alumno['peso'] ?> kg</div>
                <div><strong>Altura:</strong> <?= $alumno['altura'] ?> cm</div>
                <div><strong>Tipo de Parto:</strong> <?= $alumno['tipo_parto'] ?></div>
                <div><strong>Vacunas:</strong> <?= $alumno['vacunas'] ?></div>
                <div><strong>Condición Física:</strong> <?= $alumno['condicion_fisica'] ?></div>
                <div><strong>Dirección de Habitación:</strong> <?= $alumno['direccion_habitacion'] ?></div>
                <div><strong>Asiste a Control de Niños Sanos:</strong> <?= $alumno['control_ninos_sanos'] ?></div>
                <div><strong>Foto:</strong><img style="height: 150px; border: #666 2px solid; padding: 5px;" src="<?= $alumno['foto'] ?>" alt="foto"></div>
            </div>
        </div>

        <!-- Card Datos del Padre -->
        <div class="card">
            <div class="card-header">Datos del Padre</div>
            <div class="card-content">
                <div><strong>Nombre:</strong> <?= $padre['nombres'] . ' ' . $padre['apellidos'] ?></div>
                <div><strong>Cédula:</strong> <?= $padre['cedula'] ?></div>
                <div><strong>Telefono:</strong> <?= $padre['telefono'] ?></div>
                <div><strong>Fecha de nacimiento:</strong> <?= $padre['fecha_nacimiento'] ?></div>
                <div><strong>Nacionalidad:</strong> <?= $padre['nacionalidad'] ?></div>
                <div><strong>Estado civil:</strong> <?= $padre['estado_civil'] ?></div>
                <div><strong>Grado de instrucción:</strong> <?= $padre['grado_instruccion'] ?></div>
                <div><strong>Número de hijos:</strong> <?= $padre['numero_hijos'] ?></div>
                <div><strong>Hijos estudiando:</strong> <?= $padre['hijos_estudian'] ?></div>
                <div><strong>Religion:</strong> <?= $padre['religion'] ?></div>
                <div><strong>Vive con el niño:</strong> <?= $padre['vive_con_nino'] ?></div>
                <div><strong>Foto:</strong><img style="height: 150px; border: #666 2px solid; padding: 5px;" src="<?= $padre['foto'] ?>" alt="foto"></div>
            </div>
        </div>

        <!-- Card Datos de la Madre -->
        <div class="card">
            <div class="card-header">Datos de la Madre</div>
            <div class="card-content">
                <div><strong>Nombre:</strong> <?= $madre['nombres'] . ' ' . $madre['apellidos'] ?></div>
                <div><strong>Cédula:</strong> <?= $madre['cedula'] ?></div>
                <div><strong>Telefono:</strong> <?= $madre['telefono'] ?></div>
                <div><strong>Fecha de nacimiento:</strong> <?= $madre['fecha_nacimiento'] ?></div>
                <div><strong>Nacionalidad:</strong> <?= $madre['nacionalidad'] ?></div>
                <div><strong>Estado civil:</strong> <?= $madre['estado_civil'] ?></div>
                <div><strong>Grado de instrucción:</strong> <?= $madre['grado_instruccion'] ?></div>
                <div><strong>Número de hijos:</strong> <?= $madre['numero_hijos'] ?></div>
                <div><strong>Hijos estudiando:</strong> <?= $madre['hijos_estudian'] ?></div>
                <div><strong>Religion:</strong> <?= $madre['religion'] ?></div>
                <div><strong>Vive con el niño:</strong> <?= $madre['vive_con_nino'] ?></div>
                <div><strong>Foto:</strong><img style="height: 150px; border: #666 2px solid; padding: 5px;" src="<?= $madre['foto'] ?>" alt="foto"></div>
            </div>
        </div>

        <!-- Card Datos del Representante -->
        <div class="card">
            <div class="card-header">Datos del Representante</div>
            <div class="card-content">
                <div><strong>Nombre:</strong> <?= $representante['nombres'] . ' ' . $representante['apellidos'] ?></div>
                <div><strong>Cédula:</strong> <?= $representante['cedula'] ?></div>
                <div><strong>Telefono:</strong> <?= $representante['telefono'] ?></div>
                <div><strong>Correo:</strong> <?= $representante['correo'] ?></div>
                <div><strong>Fecha de nacimiento:</strong> <?= $representante['fecha_nacimiento'] ?></div>
                <div><strong>Nacionalidad:</strong> <?= $representante['nacionalidad'] ?></div>
                <div><strong>Estado civil:</strong> <?= $representante['estado_civil'] ?></div>
                <div><strong>Grado de instrucción:</strong> <?= $representante['grado_instruccion'] ?></div>
                <div><strong>Número de hijos:</strong> <?= $representante['numero_hijos'] ?></div>
                <div><strong>Hijos estudiando:</strong> <?= $representante['hijos_estudian'] ?></div>
                <div><strong>Religion:</strong> <?= $representante['religion'] ?></div>
                <div><strong>Vive con el niño:</strong> <?= $representante['vive_con_nino'] ?></div>
                <div><strong>Foto:</strong><img style="height: 150px; border: #666 2px solid; padding: 5px;" src="<?= $representante['foto'] ?>" alt="foto"></div>
            </div>
        </div>

        <!-- Botón Volver -->
        <div class="btn-container">
            <a href="index.php" class="btn">Volver</a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <p>Desarrollado por:</p>
            <p>Servicio Comunitario</p>
            <p>Ingeniería en Sistemas</p>
            <img src="img/psm.png" alt="Logo Empresa">
            <p>IUP "Santiago Mariño"</p>
        </div>
    </footer>
</body>

</html>