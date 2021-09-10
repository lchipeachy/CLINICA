<?php
    require("fpdf/fpdf.php");

    include("conexion.php");
    $con = conectar();

    $id = isset($_GET['id']) ? $_GET['id'] : '';

    $sql="select ID_Consulta, consulta.ID_Medico, Fecha, concat_ws(' ', medico.Nombres, medico.Apellidos) as 'Medico', Especialidad, consulta.ID_Paciente, concat_ws(' ', paciente.Nombres, paciente.Apellidos) as 'Paciente', Diagnostico, Tratamiento, Precio
    from consulta
    inner join medico on consulta.ID_Medico = medico.ID_Medico 
    inner join paciente on consulta.ID_Paciente = paciente.ID_Paciente where ID_Consulta = '$id'";
    $query = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($query);

class PDF extends FPDF
{
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculamos ancho y posición del título.
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colores de los bordes, fondo y texto
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(230,230,0);
    $this->SetTextColor(220,50,50);
    // Ancho del borde (1 mm)
    $this->SetLineWidth(1);
    // Título
    $this->Cell($w,9,$title,1,1,'C',true);
    // Salto de línea
    $this->Ln(10);
}

function Footer()
{
    // Posición a 1,5 cm del final
    $this->SetY(-15);
    // Arial itálica 8
    $this->SetFont('Arial','I',8);
    // Color del texto en gris
    $this->SetTextColor(128);
    // Número de página
    $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
    // Arial 12
    $this->SetFont('Arial','',12);
    // Color de fondo
    $this->SetFillColor(200,220,255);
    // Título
    $this->Cell(0,6,"Capítulo $num : $label",0,1,'L',true);
    // Salto de línea
    $this->Ln(4);
}

function ChapterBody($file)
{
    // Leemos el fichero
    $txt = ($file);
    // Times 12
    $this->SetFont('Times','',12);
    // Imprimimos el texto justificado
    $this->MultiCell(180,4,$txt,0,'L');
    // Salto de línea
    $this->Ln();
    // Cita en itálica
    $this->SetFont('','I');
    $this->Cell(0,5,'(fin del extracto)');
}

function PrintChapter($num, $title, $file)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = '20000 Leguas de Viaje Submarino';
$pdf->SetTitle($title);
$pdf->SetAuthor('Julio Verne');
$pdf->PrintChapter(1,'UN RIZO DE HUIDA',$row['Diagnostico']);
$pdf->PrintChapter(2,'LOS PROS Y LOS CONTRAS','20k_c2.txt');
$pdf->Output();
?>