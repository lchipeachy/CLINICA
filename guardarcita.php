<?php

    include("conexion.php");
    $con = conectar();


    $sql = "select max(ID_Cita) as id from citas";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $CodigoCita = $row['id'] + 1;

    $CodigoMedico = $_POST['ID_Medico'];
    $CodigoPaciente = $_POST['ID_Paciente'];
    $Fecha = $_POST['fecha'];
    $Hora = $_POST['hora'];

    $sql = "select count(*) as cont from citas where fecha = '" . date("Y-m-d", strtotime($Fecha)) . "' and hora = '" . $Hora ."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $Contador = $row['cont'];

    if ($Contador <= 0){
        $sql = "INSERT INTO citas VALUES('$CodigoCita', '$CodigoMedico', '$CodigoPaciente', '$Fecha', '$Hora')";
        $query = mysqli_query($con, $sql);
        if($query){
            Header("Location: citas.php");
        }else{
            echo "<script>alert('No se obtuvo una respuesta favorable del servidor' $query )</script>";
        }
    } 
    else{
        echo "<script>
                alert('Ya existe una cita para esta fecha y hora');
                window.location= 'citas.php'
            </script>";
    }
    
    
?>