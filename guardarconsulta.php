
<?php

include("conexion.php");
$con = conectar();


$sql = "select max(ID_Consulta) as id from consulta";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$CodigoConsulta = $row['id'] + 1;

$CodigoMedico = $_POST['ID_Medico'];
$CodigoPaciente = $_POST['ID_Paciente'];
$Fecha = $_POST['Fecha'];
$Diagnostico = $_POST['Diagnostico'];
$Tratamiento = $_POST['Tratamiento'];
$Precio = $_POST['Precio'];



$sql = "INSERT INTO consulta VALUES('$CodigoConsulta', '$Fecha', '$CodigoMedico', '$CodigoPaciente', '$Diagnostico', '$Tratamiento', '$Precio')";
$query = mysqli_query($con, $sql);
if($query){
    Header("Location: consultas.php"); 
    echo "<script>alert('Datos ingresados correctamente')</script>";
}else{
    echo "<script>alert('No se obtuvo una respuesta favorable del servidor' $query )</script>";
}



?>