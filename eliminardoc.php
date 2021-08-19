<?php

include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM medico WHERE ID_Medico = '$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: doctores.php"); 
    echo "<script>alert('Datos ingresados correctamente')</script>";
}else{
    echo "<script>alert('No se obtuvo una respuesta favorable del servidor')</script>";
    echo "<script>window.history.go(-1)</script>";
}

?>
