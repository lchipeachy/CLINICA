<?php

    include("conexion.php");
    $con = conectar();

    $id = $_GET['id'];

    $sql = "DELETE FROM paciente WHERE ID_Paciente = '$id'";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: pacientes.php"); 
        echo "<script>alert('Datos ingresados correctamente')</script>";
    }else{
        echo "<script>alert('No se obtuvo una respuesta favorable del servidor')</script>";
        echo "<script>window.history.go(-1)</script>";
    }

?>
