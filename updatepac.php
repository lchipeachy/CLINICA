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

    $sql = "UPDATE paciente SET Nombres = '$Nombres' , Apellidos = '$Apellidos', Fecha_Nac = '$Fecha', Genero = '$Genero', Edad = '$Edad' , Direccion = '$Direccion' , Telefono = '$Telefono' , Email = '$Correo'  WHERE ID_Paciente = ' $Codigo' ";
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
