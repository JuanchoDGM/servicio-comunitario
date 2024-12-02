<?php
require 'fpdf/fpdf.php';
$mysqli = new mysqli("localhost", "usuario", "contraseña", "base_de_datos");

if ($mysqli->connect_error) {
    die("Conexión fallida: " . $mysqli->connect_error);
}

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Reporte de Alumnos por Grupo', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    function ChapterTitle($label)
    {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, $label, 0, 1, 'L');
        $this->Ln(4);
    }

    function ChapterBody($body)
    {
        $this->SetFont('Arial', '', 12);
        $this->MultiCell(0, 10, $body);
        $this->Ln();
    }

    function AddGroup($group)
    {
        $this->ChapterTitle($group);
        global $mysqli;
        $result = $mysqli->query("SELECT nombres, apellidos, fecha_nacimiento, cedula_escolar FROM alumnos WHERE grupo='$group'");
        while ($row = $result->fetch_assoc()) {
            $this->ChapterBody("Nombre: " . $row['nombres'] . " " . $row['apellidos'] . "\nFecha de Nacimiento: " . $row['fecha_nacimiento'] . "\nCédula Escolar: " . $row['cedula_escolar']);
        }
    }
}

$pdf = new PDF();
$pdf->AddPage();
$groups = ['Maternal', 'Grupo 1', 'Grupo 2', 'Grupo 3'];
foreach ($groups as $group) {
    $pdf->AddGroup($group);
}
$pdf->Output();
