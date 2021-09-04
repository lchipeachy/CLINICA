<?php 

include ("fpdf/fpdf.php");
include 'conexion.php';
$consulta = "SELECT * FROM medico";
$resultado = $mysqli->query($consulta);


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image('doctor.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Ln(10);
        $this->Cell(60);
        // Título
        $this->Cell(100,10,'Reporte de Personal Medico',1,0,'C');
        // Salto de línea
        $this->Ln(25);
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

$pdf = new PDF('P','mm','A4');
$pdf->SetMargins(5, 10 , 10); 
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont("Arial", "B", 10);

$pdf->Cell(25 , 5, "DPI", 1, 0, "C");
$pdf->Cell(25 , 5, "Nombres", 1, 0, "C");
$pdf->Cell(25 , 5, "Apellidos", 1, 0, "C");
$pdf->Cell(25 , 5, "Direccion", 1, 0, "C");
$pdf->Cell(25 , 5, "Telefono", 1, 0, "C");
$pdf->Cell(38 , 5, "Email", 1, 0, "C");
$pdf->Cell(35 , 5, "Especialidad", 1, 1, "C");

$pdf->SetFont("Arial", "", 9);


while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(25 , 5, $fila['ID_Medico'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Nombres'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Apellidos'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Direccion'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Telefono'], 1, 0, 'C');
    $pdf->Cell(38 , 5, $fila['Email'], 1, 0, 'C');
    $pdf->Cell(35 , 5, $fila['Especialidad'], 1, 1, 'C');
}
$pdf->Output();

?>