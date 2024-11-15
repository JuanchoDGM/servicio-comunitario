<?php
include 'includes/conexion.php';

// Verificamos si el ID del alumno está presente
if (isset($_GET['id'])) {
    $alumno_id = $_GET['id'];

    // Eliminar los datos del padre asociados con el alumno
    $sql_delete_padre = "DELETE FROM padres WHERE alumno_id = ?";
    $stmt_padre = $conn->prepare($sql_delete_padre);
    $stmt_padre->bind_param("i", $alumno_id);
    $stmt_padre->execute();

    // Eliminar los datos de la madre asociados con el alumno
    $sql_delete_madre = "DELETE FROM madres WHERE alumno_id = ?";
    $stmt_madre = $conn->prepare($sql_delete_madre);
    $stmt_madre->bind_param("i", $alumno_id);
    $stmt_madre->execute();

    // Eliminar los datos del representante asociados con el alumno
    $sql_delete_representante = "DELETE FROM representantes WHERE alumno_id = ?";
    $stmt_representante = $conn->prepare($sql_delete_representante);
    $stmt_representante->bind_param("i", $alumno_id);
    $stmt_representante->execute();

    // Eliminar los datos del alumno
    $sql_delete_alumno = "DELETE FROM alumnos WHERE id = ?";
    $stmt_alumno = $conn->prepare($sql_delete_alumno);
    $stmt_alumno->bind_param("i", $alumno_id);
    $stmt_alumno->execute();

    // Verificamos si la eliminación fue exitosa
    if ($stmt_alumno->affected_rows > 0) {
        echo "Alumno y sus datos asociados eliminados correctamente. <a href='index.php'>Volver al inicio</a>";
    } else {
        echo "Error al eliminar el alumno.";
    }

    // Cerramos las conexiones
    $stmt_padre->close();
    $stmt_madre->close();
    $stmt_representante->close();
    $stmt_alumno->close();
} else {
    echo "ID de alumno no especificado.";
}

$conn->close();
?>