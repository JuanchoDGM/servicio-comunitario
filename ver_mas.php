<?php
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
    <title>Información del Alumno</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <h1>Información Completa del Alumno</h1>
    <div class="card">
        <h2>Datos del Alumno</h2>
        <p><strong>Nombre:</strong> <?= $alumno['nombres'] . ' ' . $alumno['apellidos'] ?></p>
        <p><strong>Cédula Escolar:</strong> <?= $alumno['cedula_escolar'] ?></p>
        <p><strong>Fecha de Nacimiento:</strong> <?= $alumno['fecha_nacimiento'] ?></p>
        <p><strong>Lugar de Nacimiento:</strong> <?= $alumno['lugar_nacimiento'] ?></p>
        <p><strong>Procede de Hogar:</strong> <?= $alumno['procede_hogar'] ?></p>
        <p><strong>Procede de Otro Plantel:</strong> <?= $alumno['procede_plantel'] ?></p>
        <p><strong>Talla de Camisa:</strong> <?= $alumno['talla_camisa'] ?></p>
        <p><strong>Talla de Pantalón:</strong> <?= $alumno['talla_pantalon'] ?></p>
        <p><strong>Talla de Zapato:</strong> <?= $alumno['talla_zapato'] ?></p>
        <p><strong>Peso:</strong> <?= $alumno['peso'] ?> kg</p>
        <p><strong>Altura:</strong> <?= $alumno['altura'] ?> cm</p>
        <p><strong>Tipo de Parto:</strong> <?= $alumno['tipo_parto'] ?></p>
        <p><strong>Vacunas:</strong> <?= $alumno['vacunas'] ?></p>
        <p><strong>Condición Física:</strong> <?= $alumno['condicion_fisica'] ?></p>
        <p><strong>Dirección de Habitación:</strong> <?= $alumno['direccion_habitacion'] ?></p>
        <p><strong>Asiste a Control de Niños Sanos:</strong> <?= $alumno['control_ninos_sanos'] ?></p>
    </div>

    <div class="card">
        <h2>Datos del Padre</h2>
        <p><strong>Nombre:</strong> <?= $padre['nombres'] . ' ' . $padre['apellidos'] ?></p>
        <p><strong>Cédula:</strong> <?= $padre['cedula'] ?></p>
        <p><strong>Telefono</strong> <?= $padre['telefono'] ?></p>
        <p><strong>Fecha de nacimiento:</strong> <?= $padre['fecha_nacimiento'] ?></p>
        <p><strong>Nacionalidad:</strong> <?= $padre['nacionalidad'] ?></p>
        <p><strong>Estado civil:</strong> <?= $padre['estado_civil'] ?></p>

    </div>

    <div class="card">
        <h2>Datos de la Madre</h2>
        <p><strong>Nombre:</strong> <?= $madre['nombres'] . ' ' . $madre['apellidos'] ?></p>
        <p><strong>Cédula:</strong> <?= $madre['cedula'] ?></p>
    </div>

    <div class="card">
        <h2>Datos del Representante</h2>
        <p><strong>Nombre:</strong> <?= $representante['nombres'] . ' ' . $representante['apellidos'] ?></p>
        <p><strong>Cédula:</strong> <?= $representante['cedula'] ?></p>
    </div>

    <a href="index.php" class="btn btn-primary">Volver</a>
</body>
</html>