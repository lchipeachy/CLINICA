<?php
    include("conexion.php");
    $con = conectar();

    $id=$_GET['id'];

    $sql="SELECT * FROM citas WHERE ID_Cita = '$id'";
    $query = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($query);

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

    <h2 class="color">Generar Consulta</h2>
    <div class="container mt-5">
        <form action="guardarconsulta.php" method="POST">
            <input type="hidden" name="ID_Paciente" id="ID_Paciente" value="<?php echo $row['ID_Paciente'] ?>">
            <input type="hidden" name="ID_Medico" id="ID_Medico" value="<?php echo $row['ID_Medico'] ?>">
            <input type="hidden" name="Fecha" id="Fecha" value="<?php echo $row['Fecha'] ?>">

            <textarea type="hidden" class="form-control mb-3" name="Diagnostico" placeholder="Ingrese el diagnostico" id="Diagnostico" ></textarea>

            <textarea type="hidden" class="form-control mb-3" name="Tratamiento" placeholder="Ingrese el Tratamiento" id="Tratamiento" ></textarea>
        
            <input type="text" class="form-control mb-3" id="Precio" name="Precio" placeholder="Q0.00">

            <input type="submit" class="btn btn-success" value="Guardar"><br><br>
        </form>
    </div>
</body>
</html>