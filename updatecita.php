<?php

    include("conexion.php");
    $con = conectar();

    $CodigoCita = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : 0;
    
    $CodigoMedico = $_POST['ID_Medico'];
    $CodigoPaciente = $_POST['ID_Paciente'];
    $Fecha = $_POST['fecha'];
    $Hora = $_POST['hora'];

    $sql = "select count(*) as cont from citas where fecha = '" . date("Y-m-d", strtotime($Fecha)) . "' and hora = '" . $Hora ."' and ID_Cita != $CodigoCita";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $Contador = $row['cont'];

    if ($Contador <= 0){
        $sql = "UPDATE citas SET ID_Medico = '$CodigoMedico' , ID_Paciente = '$CodigoPaciente', Fecha = '$Fecha', Hora = '$Hora' where ID_Cita =  $CodigoCita ";
        $query = mysqli_query($con, $sql);
        if($query){
            Header("Location: citas.php");
            echo "<script>alert('Datos ingresados correctamente')</script>";
        }else{
            echo "<script>alert('No se obtuvo una respuesta favorable del servidor')</script>";
        }
    } 
    else{
        echo "<script>
                alert('Ya existe una cita para esta fecha y hora');
                window.location= 'citas.php'
            </script>";
    }
?>
