<?php

include("conexion.php");
$con = conectar();

$Codigo = $_POST['dpi'];
$Nombres = $_POST['nombre'];
$Apellidos = $_POST['apellido'];
$Direccion = $_POST['direccion'];
$Telefono = $_POST['telefono'];
$Correo = $_POST['correo'];
$Especialidad = $_POST['especialidad'];

$sql = "INSERT INTO medico VALUES('$Codigo', '$Nombres', '$Apellidos', '$Direccion', '$Telefono', '$Correo', '$Especialidad')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: doctores.php");
}else{
    echo "<script>alert('No se obtuvo una respuesta favorable del servidor')</script>";
}
?>