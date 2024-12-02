<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inscripción de Alumno</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <!-- Header -->
    <header>
        <img style="height: 150px;" src="img/logo_marcelino.png" alt="Logo Institución">
        <h1>Inscripción del alumno</h1>
    </header>
    <nav>
        <a href="index.php">Lista de Alumnos</a> |
        <a class="logout" href="logout.php">Cerrar Sesión</a>

    </nav>


    <!-- <h1>Inscripción de Alumno</h1> -->
    <form action="procesar_inscripcion.php" method="POST" enctype="multipart/form-data">
        <h2>Datos del Estudiante</h2>


        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" id="nombres" required>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" required>

        <label for="foto">Foto del Estudiante:</label>
        <input type="file" name="foto" id="foto" required>

        <label for="cedula_escolar">Cédula Escolar:</label>
        <input type="text" name="cedula_escolar" id="cedula_escolar" required>

        <label for="grupo">Nivel a cursar:</label>
        <select name="grupo" id="grupo" required>
            <option value="Maternal">Maternal</option>
            <option value="Grupo 1">Grupo 1</option>
            <option value="Grupo 2">Grupo 2</option>
            <option value="Grupo 3">Grupo 3</option>
        </select>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>

        <label for="lugar_nacimiento">Lugar de Nacimiento:</label>
        <input type="text" name="lugar_nacimiento" id="lugar_nacimiento" required>

        <label for="procede_hogar">¿Procede de Hogar?:</label>
        <select name="procede_hogar" id="procede_hogar" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <label for="procede_plantel">¿De otro plantel?:</label>
        <select name="procede_plantel" id="procede_plantel" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <label for="talla_camisa">Talla de camisa:</label>
        <input type="text" name="talla_camisa" id="talla_camisa" required>

        <label for="talla_pantalon">Talla de pantalon:</label>
        <input type="text" name="talla_pantalon" id="talla_pantalon" required>

        <label for="talla_zapato">Talla de zapato:</label>
        <input type="text" name="talla_zapato" id="talla_zapato" required>

        <label for="peso">Peso (kg):</label>
        <input type="number" name="peso" id="peso" required>

        <label for="altura">Altura (cm):</label>
        <input type="number" name="altura" id="altura" required>

        <label for="tipo_parto">¿Tipo de parto?:</label>
        <select name="tipo_parto" id="tipo_parto" required>
            <option value="normal">Normal</option>
            <option value="cesarea">Cesárea</option>
        </select>

        <label for="vacunas">Vacunas:</label>
        <input type="text" name="vacunas" id="vacunas" required>

        <label for="condicion_fisica">Condicion fisica:</label>
        <input type="text" name="condicion_fisica" id="condicion_fisica" required>

        <label for="direccion_habitacion">Direccion de Habitacion:</label>
        <input type="text" name="direccion_habitacion" id="direccion_habitacion" required>

        <label for="control_ninos_sanos">¿Asiste a control de niño sano?:</label>
        <select name="control_ninos_sanos" id="control_ninos_sanos" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <!-- Otros campos de inscripción del estudiante aquí... -->

        <h2>Datos del Padre</h2>
        <label for="padre_nombres">Nombres:</label>
        <input type="text" name="padre_nombres" id="padre_nombres" required>

        <label for="padre_apellidos">Apellidos:</label>
        <input type="text" name="padre_apellidos" id="padre_apellidos" required>

        <label for="padre_foto">Foto:</label>
        <input type="file" name="padre_foto" id="padre_foto" required>

        <label for="padre_cedula">Cédula:</label>
        <input type="text" name="padre_cedula" id="padre_cedula" required>

        <label for="padre_telefono">Telefono:</label>
        <input type="text" name="padre_telefono" id="padre_telefono" required>

        <label for="padre_fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="padre_fecha_nacimiento" id="padre_fecha_nacimiento" required>

        <label for="padre_nacionalidad">Nacionalidad:</label>
        <input type="text" name="padre_nacionalidad" id="padre_nacionalidad" required>

        <label for="padre_estado_civil">Estado Civil:</label>
        <input type="text" name="padre_estado_civil" id="padre_estado_civil" required>

        <label for="padre_grado_instruccion">Grado de instruccion:</label>
        <input type="text" name="padre_grado_instruccion" id="padre_grado_instruccion" required>

        <label for="padre_numero_hijos">Numero de Hijos:</label>
        <input type="text" name="padre_numero_hijos" id="padre_numero_hijos" required>

        <label for="padre_hijos_estudian">¿Cuantos Estudian?:</label>
        <input type="text" name="padre_hijos_estudian" id="padre_hijos_estudian" required>

        <label for="padre_religion">Religion:</label>
        <input type="text" name="padre_religion" id="padre_religion" required>

        <label for="padre_vive_nino">¿Vive con el niño?:</label>
        <select name="padre_vive_nino" id="padre_vive_nino" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <h2>Datos de la Madre</h2>
        <label for="madre_nombres">Nombres:</label>
        <input type="text" name="madre_nombres" id="madre_nombres" required>

        <label for="madre_apellidos">Apellidos:</label>
        <input type="text" name="madre_apellidos" id="madre_apellidos" required>

        <label for="madre_foto">Foto:</label>
        <input type="file" name="madre_foto" id="madre_foto" required>

        <label for="madre_cedula">Cédula:</label>
        <input type="text" name="madre_cedula" id="madre_cedula" required>

        <label for="madre_telefono">Telefono:</label>
        <input type="text" name="madre_telefono" id="madre_telefono" required>

        <label for="madre_fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="madre_fecha_nacimiento" id="madre_fecha_nacimiento" required>

        <label for="madre_nacionalidad">Nacionalidad:</label>
        <input type="text" name="madre_nacionalidad" id="madre_nacionalidad" required>

        <label for="madre_estado_civil">Estado Civil:</label>
        <input type="text" name="madre_estado_civil" id="madre_estado_civil" required>

        <label for="madre_grado_instruccion">Grado de instruccion:</label>
        <input type="text" name="madre_grado_instruccion" id="madre_grado_instruccion" required>

        <label for="madre_numero_hijos">Numero de Hijos:</label>
        <input type="text" name="madre_numero_hijos" id="madre_numero_hijos" required>

        <label for="madre_hijos_estudian">¿Cuantos Estudian?:</label>
        <input type="text" name="madre_hijos_estudian" id="madre_hijos_estudian" required>

        <label for="madre_religion">Religion:</label>
        <input type="text" name="madre_religion" id="madre_religion" required>

        <label for="madre_vive_nino">¿Vive con el niño?:</label>
        <select name="madre_vive_nino" id="madre_vive_nino" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>

        <h2>Datos del representante</h2>
        <label for="representante_nombres">Nombres:</label>
        <input type="text" name="representante_nombres" id="representante_nombres" required>

        <label for="representante_apellidos">Apellidos:</label>
        <input type="text" name="representante_apellidos" id="representante_apellidos" required>

        <label for="representante_foto">Foto:</label>
        <input type="file" name="representante_foto" id="representante_foto" required>

        <label for="representante_cedula">Cédula:</label>
        <input type="text" name="representante_cedula" id="representante_cedula" required>

        <label for="representante_telefono">Telefono:</label>
        <input type="text" name="representante_telefono" id="representante_telefono" required>

        <label for="representante_correo">Correo:</label>
        <input type="email" name="representante_correo" id="representante_correo" required>

        <label for="representante_fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="representante_fecha_nacimiento" id="representante_fecha_nacimiento" required>

        <label for="representante_nacionalidad">Nacionalidad:</label>
        <input type="text" name="representante_nacionalidad" id="representante_nacionalidad" required>

        <label for="representante_estado_civil">Estado Civil:</label>
        <input type="text" name="representante_estado_civil" id="representante_estado_civil" required>

        <label for="representante_grado_instruccion">Grado de instruccion:</label>
        <input type="text" name="representante_grado_instruccion" id="representante_grado_instruccion" required>

        <label for="representante_numero_hijos">Numero de Hijos:</label>
        <input type="text" name="representante_numero_hijos" id="representante_numero_hijos" required>

        <label for="representante_hijos_estudian">¿Cuantos Estudian?:</label>
        <input type="text" name="representante_hijos_estudian" id="representante_hijos_estudian" required>

        <label for="representante_religion">Religion:</label>
        <input type="text" name="representante_religion" id="representante_religion" required>

        <label for="representante_vive_nino">¿Vive con el niño?:</label>
        <select name="representante_vive_nino" id="representante_vive_nino" required>
            <option value="si">Sí</option>
            <option value="no">No</option>
        </select>


        <button type="submit">Inscribir</button>
    </form>
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