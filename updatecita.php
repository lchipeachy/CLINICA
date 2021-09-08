<?php

    include("conexion.php");
    $con = conectar();

    $CodigoCita = $_POST['id'] + 1;
    $CodigoMedico = $_POST['ID_Medico'];
    $CodigoPaciente = $_POST['ID_Paciente'];
    $Fecha = $_POST['fecha'];
    $Hora = $_POST['hora'];

    $sql = "UPDATE citas SET ID_Medico = '$CodigoMedico' , ID_Paciente = '$CodigoPaciente', Fecha = '$Fecha', Hora = '$Hora' ";
    echo $sql;
    $query = mysqli_query($con, $sql);


    if($query){
        Header("Location: pacientes.php"); 
        echo "<script>alert('Datos ingresados correctamente')</script>";
    }else{
        echo "<script>alert('No se obtuvo una respuesta favorable del servidor')</script>";
        echo "<script>window.history.go(-2)</script>";
    }
?>
