<?php 

include ("fpdf/fpdf.php");
require 'coneReporte.php';
$consulta = "SELECT * FROM medico";
$resultado = $mysqli->query($consulta);


$pdf = new FPDF('P','mm','A4');
$pdf->SetMargins(5, 10 , 10); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial", "B",20); 

$pdf->Cell(100 , 10, "Reporte de Personal Medico", 0, 1, "C");

$pdf->Ln(6);
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