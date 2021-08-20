<?php 

include ("fpdf/fpdf.php");
require 'coneReporte.php';
$consulta = "SELECT * FROM paciente";
$resultado = $mysqli->query($consulta);


$pdf = new FPDF('P','mm','A3');
$pdf->SetMargins(15, 10 , 15); 
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont("Arial", "B",20); 

$pdf->Cell(100 , 10, "Reporte de Pacientes", 0, 1, "C");

$pdf->Ln(6);
$pdf->SetFont("Arial", "B", 10);

$pdf->Cell(25 , 5, "DPI", 1, 0, "C");
$pdf->Cell(25 , 5, "Nombres", 1, 0, "C");
$pdf->Cell(25 , 5, "Apellidos", 1, 0, "C");
$pdf->Cell(40 , 5, "Fecha de Nacimiento", 1, 0, "C");
$pdf->Cell(25 , 5, "Sexo", 1, 0, "C");
$pdf->Cell(25 , 5, "Edad", 1, 0, "C");
$pdf->Cell(25 , 5, "Direccion", 1, 0, "C");
$pdf->Cell(25 , 5, "Telefono", 1, 0, "C");
$pdf->Cell(38 , 5, "Email", 1, 0, "C");

$pdf->SetFont("Arial", "", 9);


while ($fila = $resultado->fetch_assoc()){
    $pdf->Cell(25 , 5, $fila['ID_Paciente'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Nombres'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Apellidos'], 1, 0, 'C');
    $pdf->Cell(40 , 5, $fila['Fecha_Nac'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Genero'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Edad'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Direccion'], 1, 0, 'C');
    $pdf->Cell(25 , 5, $fila['Telefono'], 1, 0, 'C');
    $pdf->Cell(38 , 5, $fila['Email'], 1, 0, 'C');
}
$pdf->Output();

?>