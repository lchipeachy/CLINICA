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

$sql = "UPDATE medico SET Nombres = '$Nombres' , Apellidos = '$Apellidos' , Direccion = '$Direccion' , Telefono = '$Telefono' , Email = '$Correo' , Especialidad = '$Especialidad' WHERE ID_Medico = ' $Codigo' ";
echo $sql;
$query = mysqli_query($con, $sql);


if($query){
    Header("Location: doctores.php"); 
    echo "<script>alert('Datos ingresados correctamente')</script>";
}else{
    echo "<script>alert('No se obtuvo una respuesta favorable del servidor')</script>";
    echo "<script>window.history.go(-2)</script>";
}
?>
