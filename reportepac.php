<?php 

include ("fpdf/fpdf.php");
include 'conexion.php';
$consulta = "SELECT * FROM paciente";
$resultado = $mysqli->query($consulta);

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('paciente.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        $this->Ln(10);
        // Movernos a la derecha
        $this->Cell(90);
        // Título
        $this->Cell(100,10,'Reporte de Personal Pacientes',1,0,'C');
        // Salto de línea
        $this->Ln(10);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

$pdf = new PDF('L','mm','A4');
$pdf->SetMargins(5, 10 , 10); 
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->Ln(15);
$pdf->SetFont("Arial", "B", 12);

$pdf->Cell(20 , 5, "DPI", 1, 0, "C");
$pdf->Cell(25 , 5, "Nombres", 1, 0, "C");
$pdf->Cell(25 , 5, "Apellidos", 1, 0, "C");
$pdf->Cell(25 , 5, "Nacimiento", 1, 0, "C");
$pdf->Cell(25 , 5, "Genero", 1, 0, "C");
$pdf->Cell(25 , 5, "Edad", 1, 0, "C");
$pdf->Cell(40 , 5, "Direccion", 1, 0, "C");
$pdf->Cell(40 , 5, "Telefono", 1, 0, "C");
$pdf->Cell(50 , 5, "Email", 1, 1 , "C");

$pdf->SetFont("Arial", "", 10);


while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(20 , 5, $fila['ID_Paciente'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Nombres'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Apellidos'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Fecha_Nac'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Genero'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Edad'], 1, 0, 'C');
    $pdf->Cell(40 , 5, $fila['Direccion'], 1, 0, 'C');
    $pdf->Cell(40 , 5, $fila['Telefono'], 1, 0, 'C');
    $pdf->Cell(50 , 5, $fila['Email'], 1, 1, 'C');
}
$pdf->Output();
?>