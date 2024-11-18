<?php
    // include 'includes/conexion.php';
    // // Verificar si se recibe el ID del alumno
    // if (isset($_GET['id'])) {
    //     $alumno_id = intval($_GET['id']);

    //     // Obtener los datos actuales del alumno
    //     $sql_alumno = "SELECT * FROM alumnos WHERE id = $alumno_id";
    //     $result_alumno = $conn->query($sql_alumno);
    //     $alumnos = $result_alumno->fetch_assoc();

    //     // Obtener los datos actuales del padre, madre y representante
    //     $sql_padre = "SELECT * FROM padres WHERE alumno_id = $alumno_id";
    //     $result_padre = $conn->query($sql_padre);
    //     $padre = $result_padre->fetch_assoc();

    //     $sql_madre = "SELECT * FROM madres WHERE alumno_id = $alumno_id";
    //     $result_madre = $conn->query($sql_madre);
    //     $madres = $result_madre->fetch_assoc();

    //     $sql_representante = "SELECT * FROM representantes WHERE alumno_id = $alumno_id";
    //     $result_representante = $conn->query($sql_representante);
    //     $representantes = $result_representante->fetch_assoc();
    // } else {
    //     echo "ID de alumno no especificado.";
    //     exit();
    // }

    // // Verificar si los datos fueron enviados
    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     // Datos del alumno
    //     $nombres = $_POST['nombres'];
    //     $apellidos = $_POST['apellidos'];
    //     $cedula_escolar = $_POST['cedula_escolar'];
    //     $grupo = $_POST['grupo'];
    //     $fecha_nacimiento = $_POST['fecha_nacimiento'];
    //     $lugar_nacimiento = $_POST['lugar_nacimiento'];
    //     $procede_hogar = $_POST['procede_hogar'];
    //     $procede_plantel = $_POST['procede_plantel'];
    //     $talla_camisa = $_POST['talla_camisa'];
    //     $talla_pantalon = $_POST['talla_pantalon'];
    //     $talla_zapato = $_POST['talla_zapato'];
    //     $peso = $_POST['peso'];
    //     $altura = $_POST['altura'];
    //     $tipo_parto = $_POST['tipo_parto'];
    //     $vacunas = $_POST['vacunas'];
    //     $condicion_fisica = $_POST['condicion_fisica'];
    //     $direccion_habitacion = $_POST['direccion_habitacion'];
    //     $control_ninos_sanos = $_POST['control_ninos_sanos'];

    //     // Subir la foto del estudiante
    //     if (isset($_FILES['foto'])) {
    //         $foto_estudiante = 'uploads/' . basename($_FILES['foto']['name']);
    //         move_uploaded_file($_FILES['foto']['tmp_name'], $foto_estudiante);
    //     }

    //     // Insertar los datos del alumno
    //     $sql_alumno = "INSERT INTO alumnos (nombres, apellidos, foto, cedula_escolar, fecha_nacimiento, lugar_nacimiento, procede_hogar, procede_plantel, talla_camisa, talla_pantalon, talla_zapato, peso, altura, tipo_parto, vacunas, condicion_fisica, direccion_habitacion, control_ninos_sanos,grupo) 
    //                    VALUES ('$nombres', '$apellidos', '$foto_estudiante', '$cedula_escolar', '$fecha_nacimiento', '$lugar_nacimiento', '$procede_hogar', '$procede_plantel', '$talla_camisa', '$talla_pantalon', '$talla_zapato', '$peso', '$altura', '$tipo_parto', '$vacunas', '$condicion_fisica', '$direccion_habitacion', '$control_ninos_sanos', '$grupo')";
        
    //     if ($conn->query($sql_alumno) === TRUE) {
    //         $alumno_id = $conn->insert_id;

    //         // Insertar los datos del padre
    //         $padre_nombres = $_POST['padre_nombres'];
    //         $padre_apellidos = $_POST['padre_apellidos'];
    //         $padre_cedula = $_POST['padre_cedula'];
    //         $padre_telefono = $_POST['padre_telefono'];
    //         $padre_nacionalidad = $_POST['padre_nacionalidad'];
    //         $padre_fecha_nacimiento = $_POST['padre_fecha_nacimiento'];
    //         $padre_estado_civil = $_POST['padre_estado_civil'];
    //         $padre_grado_instruccion = $_POST['padre_grado_instruccion'];
    //         $padre_numero_hijos = $_POST['padre_numero_hijos'];
    //         $padre_hijos_estudian = $_POST['padre_hijos_estudian'];
    //         $padre_religion = $_POST['padre_religion'];
    //         $padre_vive_nino = $_POST['padre_vive_nino'];


    //         // Subir foto del padre
    //         if (isset($_FILES['padre_foto'])) {
    //             $padre_foto = 'uploads/' . basename($_FILES['padre_foto']['name']);
    //             move_uploaded_file($_FILES['padre_foto']['tmp_name'], $padre_foto);
    //         }
    //         $sql_padre = "INSERT INTO padres (alumno_id, nombres, apellidos, foto, cedula, telefono, nacionalidad, fecha_nacimiento,estado_civil,grado_instruccion,numero_hijos,hijos_estudian,religion,vive_con_nino) 
    //                       VALUES ('$alumno_id', '$padre_nombres', '$padre_apellidos', '$padre_foto', '$padre_cedula', '$padre_telefono', '$padre_nacionalidad', '$padre_fecha_nacimiento','$padre_estado_civil', '$padre_grado_instruccion','$padre_numero_hijos','$padre_hijos_estudian','$padre_religion','$padre_vive_nino')";
    //         $conn->query($sql_padre);

    //         // Insertar los datos de la madre (similares a los del padre)
    //         // 
    //         // Insertar los datos del madre
    //         $madre_nombres = $_POST['madre_nombres'];
    //         $madre_apellidos = $_POST['madre_apellidos'];
    //         $madre_cedula = $_POST['madre_cedula'];
    //         $madre_telefono = $_POST['madre_telefono'];
    //         $madre_nacionalidad = $_POST['madre_nacionalidad'];
    //         $madre_fecha_nacimiento = $_POST['madre_fecha_nacimiento'];
    //         $madre_estado_civil = $_POST['madre_estado_civil'];
    //         $madre_grado_instruccion = $_POST['madre_grado_instruccion'];
    //         $madre_numero_hijos = $_POST['madre_numero_hijos'];
    //         $madre_hijos_estudian = $_POST['madre_hijos_estudian'];
    //         $madre_religion = $_POST['madre_religion'];
    //         $madre_vive_nino = $_POST['madre_vive_nino'];


    //         // Subir foto del madre
    //         if (isset($_FILES['madre_foto'])) {
    //             $madre_foto = 'uploads/' . basename($_FILES['madre_foto']['name']);
    //             move_uploaded_file($_FILES['madre_foto']['tmp_name'], $madre_foto);
    //         }
    //         $sql_madre = "INSERT INTO madres (alumno_id, nombres, apellidos, foto, cedula, telefono, nacionalidad, fecha_nacimiento,estado_civil,grado_instruccion,numero_hijos,hijos_estudian,religion,vive_con_nino) 
    //                       VALUES ('$alumno_id', '$madre_nombres', '$madre_apellidos', '$madre_foto', '$madre_cedula', '$madre_telefono', '$madre_nacionalidad', '$madre_fecha_nacimiento','$madre_estado_civil', '$madre_grado_instruccion','$madre_numero_hijos','$madre_hijos_estudian','$madre_religion','$madre_vive_nino')";
    //         $conn->query($sql_madre);

    //         // Insertar los datos del representante (similares a los anteriores)
    //         // ...
    //         // Insertar los datos del representante
    //         $representante_nombres = $_POST['representante_nombres'];
    //         $representante_apellidos = $_POST['representante_apellidos'];
    //         $representante_cedula = $_POST['representante_cedula'];
    //         $representante_telefono = $_POST['representante_telefono'];
    //         $representante_nacionalidad = $_POST['representante_nacionalidad'];
    //         $representante_fecha_nacimiento = $_POST['representante_fecha_nacimiento'];
    //         $representante_estado_civil = $_POST['representante_estado_civil'];
    //         $representante_grado_instruccion = $_POST['representante_grado_instruccion'];
    //         $representante_numero_hijos = $_POST['representante_numero_hijos'];
    //         $representante_hijos_estudian = $_POST['representante_hijos_estudian'];
    //         $representante_religion = $_POST['representante_religion'];
    //         $representante_vive_nino = $_POST['representante_vive_nino'];


    //         // Subir foto del representante
    //         if (isset($_FILES['representante_foto'])) {
    //             $representante_foto = 'uploads/' . basename($_FILES['representante_foto']['name']);
    //             move_uploaded_file($_FILES['representante_foto']['tmp_name'], $representante_foto);
    //         }
    //         $sql_representante = "INSERT INTO representantes (alumno_id, nombres, apellidos, foto, cedula, telefono, nacionalidad, fecha_nacimiento,estado_civil,grado_instruccion,numero_hijos,hijos_estudian,religion,vive_con_nino) 
    //                       VALUES ('$alumno_id', '$representante_nombres', '$representante_apellidos', '$representante_foto', '$representante_cedula', '$representante_telefono', '$representante_nacionalidad', '$representante_fecha_nacimiento','$representante_estado_civil', '$representante_grado_instruccion','$representante_numero_hijos','$representante_hijos_estudian','$representante_religion','$representante_vive_nino')";
    //         $conn->query($sql_representante);

    //         echo "¡Modificacion exitosa! <a href='index.php'>Volver al inicio</a>";
    //     } else {
    //         echo "Error: " . $sql_alumno . "<br>" . $conn->error;
    //     }
    // }
?>
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

    

    $sql_alumno = "UPDATE alumnos SET nombres='$nombres', apellidos='$apellidos'";

    if ($conn->query($sql_alumno) === TRUE) {
        echo "Registro actualizado correctamente <a href='index.php'>Volver al inicio</a>";
    } else {
        echo "Error actualizando el registro: " . $conn->error;
    }
}

$conn->close();
