<?php
include 'includes/conexion.php';

// Verificar si se ha recibido el ID del alumno
if (isset($_POST['alumno_id'])) {
    $alumno_id = intval($_POST['alumno_id']);

    // Datos del alumno
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula_escolar = $_POST['cedula_escolar'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $lugar_nacimiento = $_POST['lugar_nacimiento'];
    $procede_hogar = $_POST['procede_hogar'];
    $procede_plantel = $_POST['procede_plantel'];
    $talla_camisa = $_POST['talla_camisa'];
    $talla_pantalon = $_POST['talla_pantalon'];
    $talla_zapato = $_POST['talla_zapato'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $tipo_parto = $_POST['tipo_parto'];
    $vacunas = $_POST['vacunas'];
    $condicion_fisica = $_POST['condicion_fisica'];
    $direccion_habitacion = $_POST['direccion_habitacion'];
    $control_ninos_sanos = $_POST['control_ninos_sanos'];

    // Subir nueva foto del estudiante si se proporciona
    if (isset($_FILES['foto_estudiante']) && $_FILES['foto_estudiante']['error'] == UPLOAD_ERR_OK) {
        $foto_estudiante = 'uploads/' . basename($_FILES['foto_estudiante']['name']);
        move_uploaded_file($_FILES['foto_estudiante']['tmp_name'], $foto_estudiante);
    } else {
        $foto_estudiante = $_POST['foto_actual_estudiante']; // Mantener la foto existente
    }

    // Actualizar datos del alumno
    $sql_alumno = "UPDATE alumnos 
                   SET nombres = '$nombres', apellidos = '$apellidos', foto = '$foto_estudiante', cedula_escolar = '$cedula_escolar', 
                       fecha_nacimiento = '$fecha_nacimiento', lugar_nacimiento = '$lugar_nacimiento', procede_hogar = '$procede_hogar', 
                       procede_plantel = '$procede_plantel', talla_camisa = '$talla_camisa', talla_pantalon = '$talla_pantalon', 
                       talla_zapato = '$talla_zapato', peso = '$peso', altura = '$altura', tipo_parto = '$tipo_parto', 
                       vacunas = '$vacunas', condicion_fisica = '$condicion_fisica', direccion_habitacion = '$direccion_habitacion', 
                       control_ninos_sanos = '$control_ninos_sanos' 
                   WHERE id = $alumno_id";
    $conn->query($sql_alumno);

    // Datos del padre
    $padre_id = $_POST['padre_id'];
    $padre_nombres = $_POST['padre_nombres'];
    $padre_apellidos = $_POST['padre_apellidos'];
    $padre_cedula = $_POST['padre_cedula'];

    // Subir nueva foto del padre si se proporciona
    if (isset($_FILES['padre_foto']) && $_FILES['padre_foto']['error'] == UPLOAD_ERR_OK) {
        $foto_padre = 'uploads/' . basename($_FILES['padre_foto']['name']);
        move_uploaded_file($_FILES['padre_foto']['tmp_name'], $foto_padre);
    } else {
        $foto_padre = $_POST['foto_actual_padre']; // Mantener la foto existente
    }

    $sql_padre = "UPDATE padres 
                  SET nombres = '$padre_nombres', apellidos = '$padre_apellidos', foto = '$foto_padre', cedula = '$padre_cedula' 
                  WHERE id = $padre_id";
    $conn->query($sql_padre);

    // Datos de la madre
    $madre_id = $_POST['madre_id'];
    $madre_nombres = $_POST['madre_nombres'];
    $madre_apellidos = $_POST['madre_apellidos'];
    $madre_cedula = $_POST['madre_cedula'];

    // Subir nueva foto de la madre si se proporciona
    if (isset($_FILES['madre_foto']) && $_FILES['madre_foto']['error'] == UPLOAD_ERR_OK) {
        $foto_madre = 'uploads/' . basename($_FILES['madre_foto']['name']);
        move_uploaded_file($_FILES['madre_foto']['tmp_name'], $foto_madre);
    } else {
        $foto_madre = $_POST['foto_actual_madre']; // Mantener la foto existente
    }

    $sql_madre = "UPDATE madres 
                  SET nombres = '$madre_nombres', apellidos = '$madre_apellidos', foto = '$foto_madre', cedula = '$madre_cedula' 
                  WHERE id = $madre_id";
    $conn->query($sql_madre);

    // Datos del representante
    $representante_id = $_POST['representante_id'];
    $rep_nombres = $_POST['rep_nombres'];
    $rep_apellidos = $_POST['rep_apellidos'];
    $rep_cedula = $_POST['rep_cedula'];

    // Subir nueva foto del representante si se proporciona
    if (isset($_FILES['rep_foto']) && $_FILES['rep_foto']['error'] == UPLOAD_ERR_OK) {
        $foto_representante = 'uploads/' . basename($_FILES['rep_foto']['name']);
        move_uploaded_file($_FILES['rep_foto']['tmp_name'], $foto_representante);
    } else {
        $foto_representante = $_POST['foto_actual_representante']; // Mantener la foto existente
    }

    $sql_representante = "UPDATE representantes 
                          SET nombres = '$rep_nombres', apellidos = '$rep_apellidos', foto = '$foto_representante', cedula = '$rep_cedula' 
                          WHERE id = $representante_id";
    $conn->query($sql_representante);

    echo "Datos del alumno y sus representantes actualizados correctamente.";
} else {
    echo "ID del alumno no proporcionado.";
}

$conn->close();
?>