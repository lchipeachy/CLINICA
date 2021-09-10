<?php
    include("conexion.php");
    $con = conectar();

    $sqlPacientes ="SELECT * FROM paciente";
    $queryPacientes = mysqli_query($con, $sqlPacientes);
    $sqlDoctores ="SELECT * FROM medico";
    $queryDoctores = mysqli_query($con, $sqlDoctores);
?>

<!DOCTYPE html>
<html lang="es-GT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica</title>

    <script src ="https://kit.fontawesome.com/18e932af55.js"></script>
    <link rel ="stylesheet" href="CSS/bootstrap.min.css">
    <link rel ="stylesheet" href="CSS/bootstrap-grid.min.css">
    <link rel ="stylesheet" href="CSS/estilo.css">

    <script src="JS/jquery-3.6.0.min.js"></script>
    <script src="JS/bootstrap.min.js"></script>
    <script src="JS/buscar.js"></script>

    <style type="text/css">
    .color {
        text-align: center;
        background-color: #076185;
        color:white;
        font-style: oblique;
        font-size: 75px;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
<div>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #076185;">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="index.php">Inicio</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link "  href="pacientes.php">Pacientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="doctores.php">Médicos</a>
            </li>
            <li class="nav-item"> 
                <a class="nav-link " href="citas.php" aria-disabled="true">Citas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="consultas.php" aria-disabled="true">Consultas</a>
            </li>
            </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" id="buscar" placeholder="Buscar..." aria-label="Search">
        </form>
        </div>
        </div>
    </nav>
</div>
    <h2 class="color">Control Consultas</h2>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Fecha</th>
                            <th scope="col">Medico</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Diagnostico</th>
                            <th scope="col">Tratamiento</th>
                            <th scope="col">Precio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tabla_resultado"> 
                        
                    </tbody>
                </table>
            </div>
            <div>

            </div>
        </div>
    </div>

    <section class="content-area">
        <div class ="table-area" id="tabla_resultados">
        </div>
    </section>
    
</body>
</html>
<script>
    var buscar = "";

    $(document).ready(function(){
        ejecutar();

        $("#buscar").on("input", function(){
            buscar = $(this).val();
            ejecutar();
        });
    });

    function ejecutar(){
        $.ajax({
            type:"POST",
            url:"tablaconsultas.php",
            data: {buscar: buscar},
            success:function(html){
                $('#tabla_resultado').html(html);
            }
        });
    }
</script>
