<?php
require('fpdf/fpdf.php');
require('includes/conexion.php'); // Asegúrate de tener tu archivo de conexión a la base de datos

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('img/logo_marcelino.png', 10, 6, 30);
        // Cargar la fuente que soporta caracteres especiales
        $this->SetFont('Arial', 'B', 15);  // Puede usar 'DejaVu' si lo prefieres
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30, 10, 'Reporte de Estudiantes Inscritos — 2024-2025', 0, 1, 'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8); // Puedes usar 'DejaVu' si lo deseas
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    // Tabla de estudiantes
    function TablaEstudiantes($header, $data)
    {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(0, 0, 128);
        $this->SetTextColor(255);
        $this->SetDrawColor(0, 0, 150);
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 10); // Cambiar a 'DejaVu' si se prefiere
        // Ancho de las columnas
        $w = [40, 40, 40, 40];
        $totalWidth = array_sum($w);
        $this->SetX(($this->w - $totalWidth) / 2); // Centrar la tabla

        // Cabecera
        foreach ($header as $i => $col) {
            $this->Cell($w[$i], 7, $col, 1, 0, 'C', true);
        }
        $this->Ln();
        // Restauración de colores y fuentes
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('Arial', '', 10); // Cambiar a 'DejaVu' si se prefiere
        // Datos
        $fill = false;
        if (empty($data)) {
            $this->Cell($totalWidth, 10, 'No hay estudiantes inscritos en este grupo.', 1, 1, 'C');
        } else {
            foreach ($data as $row) {
                $this->SetX(($this->w - $totalWidth) / 2); // Centrar la tabla
                foreach ($row as $i => $col) {
                    $this->Cell($w[$i], 6, $col, 'LR', 0, 'C', $fill);
                }
                $this->Ln();
                $fill = !$fill;
            }
            // Línea de cierre
            $this->SetX(($this->w - $totalWidth) / 2); // Centrar la tabla
            $this->Cell($totalWidth, 0, '', 'T');
        }
    }
}

// Consulta para obtener los grupos únicos
$sql_grupos = "SELECT DISTINCT grupo FROM alumnos ORDER BY grupo";
$result_grupos = $conn->query($sql_grupos);

$pdf = new PDF();
$pdf->AddPage();
$header = ['Nombres', 'Apellidos', 'Fecha Nacimiento', 'Cedula Escolar'];

while ($grupo = $result_grupos->fetch_assoc()) {
    $pdf->SetFont('Arial', 'B', 14);  // Usar Arial o DejaVu si lo prefieres
    $pdf->Cell(0, 10, $grupo['grupo'], 0, 1, 'C');
    $pdf->Ln(5);

    // Consulta para obtener los estudiantes de cada grupo
    $sql_estudiantes = "SELECT nombres, apellidos, fecha_nacimiento, cedula_escolar FROM alumnos WHERE grupo = '" . $grupo['grupo'] . "'";
    $result_estudiantes = $conn->query($sql_estudiantes);

    $data = [];
    while ($row = $result_estudiantes->fetch_assoc()) {
        $data[] = [utf8_decode($row['nombres']), utf8_decode($row['apellidos']), $row['fecha_nacimiento'], $row['cedula_escolar']];
    }

    $pdf->TablaEstudiantes($header, $data);
    // Mostrar la cantidad de estudiantes inscritos en el grupo
    $cantidad_estudiantes = count($data);
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'I', 12); // Usar Arial o DejaVu si lo prefieres
    $pdf->Cell(0, 10, 'Cantidad de estudiantes inscritos en este grupo: ' . $cantidad_estudiantes, 0, 1, 'C');
    $pdf->Ln(10);
}

$pdf->Output();
