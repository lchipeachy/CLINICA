<?php

    include("conexion.php");
    $con = conectar();

    $Codigo = $_POST['dpi'];
    $Nombres = $_POST['nombre'];
    $Apellidos = $_POST['apellido'];
    $Fecha = $_POST['fecha'];
    $Genero = $_POST['genero'];
    $Edad = $_POST['edad'];
    $Direccion = $_POST['direccion'];
    $Telefono = $_POST['telefono'];
    $Correo = $_POST['correo'];

    $sql = "INSERT INTO paciente VALUES('$Codigo', '$Nombres', '$Apellidos', '$Fecha', '$Genero', '$Edad', '$Direccion', '$Telefono', '$Correo')";
    $query = mysqli_query($con, $sql);

    if($query){
        Header("Location: pacientes.php");
    }else{
        echo "<script>alert('No se obtuvo una respuesta favorable del servidor')</script>";
    }
?>