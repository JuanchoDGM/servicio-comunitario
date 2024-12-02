<head>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<?php
include 'includes/conexion.php';

// Verificar si se recibe el ID del alumno
if (isset($_GET['id'])) {
    $alumno_id = intval($_GET['id']);

    // Obtener los datos actuales del alumno
    $sql_alumno = "SELECT * FROM alumnos WHERE id = $alumno_id";
    $result_alumno = $conn->query($sql_alumno);
    $alumnos = $result_alumno->fetch_assoc();

    // Obtener los datos actuales del padre, madre y representante
    $sql_padre = "SELECT * FROM padres WHERE alumno_id = $alumno_id";
    $result_padre = $conn->query($sql_padre);
    $padre = $result_padre->fetch_assoc();

    $sql_madre = "SELECT * FROM madres WHERE alumno_id = $alumno_id";
    $result_madre = $conn->query($sql_madre);
    $madres = $result_madre->fetch_assoc();

    $sql_representante = "SELECT * FROM representantes WHERE alumno_id = $alumno_id";
    $result_representante = $conn->query($sql_representante);
    $representantes = $result_representante->fetch_assoc();
} else {
    echo "ID de alumno no especificado.";
    exit();
}


// Actualizar información del estudiante
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $cedula_escolar = $_POST['cedula_escolar'];
    $grupo = $_POST['grupo'];
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



    $sql_alumno = "UPDATE alumnos SET nombres='$nombres', apellidos='$apellidos', cedula_escolar='$cedula_escolar', grupo='$grupo', fecha_nacimiento='$fecha_nacimiento', lugar_nacimiento='$lugar_nacimiento', procede_hogar='$procede_hogar', procede_plantel='$procede_plantel', talla_camisa='$talla_camisa', talla_pantalon='$talla_pantalon', talla_zapato='$talla_zapato', peso='$peso', altura='$altura', tipo_parto='$tipo_parto', vacunas='$vacunas', condicion_fisica='$condicion_fisica', direccion_habitacion='$direccion_habitacion', control_ninos_sanos='$control_ninos_sanos' WHERE id=$alumno_id";


    // PADRES

    $padre_nombres = $_POST['padre_nombres'];
    $padre_apellidos = $_POST['padre_apellidos'];
    $padre_cedula = $_POST['padre_cedula'];
    $padre_fecha_nacimiento = $_POST['padre_fecha_nacimiento'];
    $padre_telefono = $_POST['padre_telefono'];
    $padre_nacionalidad = $_POST['padre_nacionalidad'];
    $padre_estado_civil = $_POST['padre_estado_civil'];
    $padre_grado_instruccion = $_POST['padre_grado_instruccion'];
    $padre_numero_hijos = $_POST['padre_numero_hijos'];
    $padre_hijos_estudian = $_POST['padre_hijos_estudian'];
    $padre_religion = $_POST['padre_religion'];
    $padre_vive_nino = $_POST['padre_vive_nino'];



    $sql_padre = "UPDATE padres SET nombres='$padre_nombres', apellidos='$padre_apellidos', cedula='$padre_cedula', telefono='$padre_telefono', fecha_nacimiento='$padre_fecha_nacimiento', nacionalidad='$padre_nacionalidad', estado_civil='$padre_estado_civil', grado_instruccion='$padre_grado_instruccion', numero_hijos='$padre_numero_hijos', hijos_estudian='$padre_hijos_estudian', religion='$padre_religion', vive_con_nino='$padre_vive_nino' WHERE alumno_id=$alumno_id";


    //MADRES

    $madre_nombres = $_POST['madre_nombres'];
    $madre_apellidos = $_POST['madre_apellidos'];
    $madre_cedula = $_POST['madre_cedula'];
    $madre_fecha_nacimiento = $_POST['madre_fecha_nacimiento'];
    $madre_telefono = $_POST['madre_telefono'];
    $madre_nacionalidad = $_POST['madre_nacionalidad'];
    $madre_estado_civil = $_POST['madre_estado_civil'];
    $madre_grado_instruccion = $_POST['madre_grado_instruccion'];
    $madre_numero_hijos = $_POST['madre_numero_hijos'];
    $madre_hijos_estudian = $_POST['madre_hijos_estudian'];
    $madre_religion = $_POST['madre_religion'];
    $madre_vive_nino = $_POST['madre_vive_nino'];



    $sql_madre = "UPDATE madres SET nombres='$madre_nombres', apellidos='$madre_apellidos', cedula='$madre_cedula', telefono='$madre_telefono', fecha_nacimiento='$madre_fecha_nacimiento', nacionalidad='$madre_nacionalidad', estado_civil='$madre_estado_civil', grado_instruccion='$madre_grado_instruccion', numero_hijos='$madre_numero_hijos', hijos_estudian='$madre_hijos_estudian', religion='$madre_religion', vive_con_nino='$madre_vive_nino' WHERE alumno_id=$alumno_id";


    // REPRESENTANTES

    $representante_nombres = $_POST['representante_nombres'];
    $representante_apellidos = $_POST['representante_apellidos'];
    $representante_cedula = $_POST['representante_cedula'];
    $representante_fecha_nacimiento = $_POST['representante_fecha_nacimiento'];
    $representante_telefono = $_POST['representante_telefono'];
    $representante_correo = $_POST['representante_correo'];
    $representante_nacionalidad = $_POST['representante_nacionalidad'];
    $representante_estado_civil = $_POST['representante_estado_civil'];
    $representante_grado_instruccion = $_POST['representante_grado_instruccion'];
    $representante_numero_hijos = $_POST['representante_numero_hijos'];
    $representante_hijos_estudian = $_POST['representante_hijos_estudian'];
    $representante_religion = $_POST['representante_religion'];
    $representante_vive_nino = $_POST['representante_vive_nino'];



    $sql_representante = "UPDATE representantes SET nombres='$representante_nombres', apellidos='$representante_apellidos', cedula='$representante_cedula', telefono='$representante_telefono', correo='$representante_correo', fecha_nacimiento='$representante_fecha_nacimiento', nacionalidad='$representante_nacionalidad', estado_civil='$representante_estado_civil', grado_instruccion='$representante_grado_instruccion', numero_hijos='$representante_numero_hijos', hijos_estudian='$representante_hijos_estudian', religion='$representante_religion', vive_con_nino='$representante_vive_nino' WHERE alumno_id=$alumno_id";


    if (($conn->query($sql_alumno) && $conn->query($sql_madre) && $conn->query($sql_padre) && $conn->query($sql_representante)) === TRUE) {
        echo "<div style='display:grid; place-content:center; height:100vh; width:100%; margin:auto 0; gap:10px;'><span>¡Registro actualizado correctamente!</span><a href='index.php'><button style='background-color: #000080; color: #fff; padding: 15px 30px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;'>Volver al inicio</button></a></div>";
    } else {
        echo "Error actualizando el registro: " . $conn->error;
    }
}

$conn->close();
