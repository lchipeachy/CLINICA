<?php
    include("conexion.php");
    $con = conectar();

    $sqlPacientes ="SELECT * FROM paciente";
    $queryPacientes = mysqli_query($con, $sqlPacientes);
    $sqlDoctores ="SELECT * FROM medico";
    $queryDoctores = mysqli_query($con, $sqlDoctores);
?>

<!DOCTYPE html>
<html lang="en">
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
                <a class="nav-link " href="citas.php" tabindex="-1" aria-disabled="true">Citas</a>
            </li>
            </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" id="buscar" placeholder="Buscar..." aria-label="Search">
        </form>
        </div>
        </div>
    </nav>
</div>
    <h2 class="color">Control Citas</h2>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2">
                <form action="guardarcita.php" method="POST">
                    <input type="text" class="form-control mb-3" list="listPac" name="ID_Paciente" id="ID_Paciente">
                    <datalist id="listPac">
                        <?php while($row = mysqli_fetch_array($queryPacientes)){ ?>
                        <option value="<?=$row['ID_Paciente']; ?>"><?=$row['Nombres'] . ' ' . $row['Apellidos']; ?></option>
                        <?php } ?>
                    </datalist>
                    <input type="text" class="form-control mb-3" list="listDoc" name="ID_Medico" id="ID_Medico">
                    <datalist id="listDoc">
                        <?php while($row = mysqli_fetch_array($queryDoctores)){ ?>
                        <option value="<?=$row['ID_Medico']; ?>"><?=$row['Nombres'] . ' ' . $row['Apellidos']; ?></option>
                        <?php } ?>
                    </datalist>

                    <input type="date" class="form-control mb-3" name="fecha" placeholder="Seleccione la fecha" id="fecha" autocomplete="off" required>
                    <select name="hora" id="hora" placeholder="Seleccione la hora"  class="form-select mb-3" required>
                    <option selected disabled value="">Seleccione la hora</option>
                    <option>9:00</option>
                    <option>10:00</option>
                    <option>11:00</option>
                    <option>14:00</option>
                    <option>15:00</option>
                    <option>14:00</option>
                
                    <input type="submit" class="btn btn-success" value="Guardar"><br><br>
                </form>
            </div>
                <div class="col-md-8">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Medico</th>
                            <th scope="col">Especialidad</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Fecha de cita</th>
                            <th scope="col">Hora</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tabla_resultado"> 
                        
                    </tbody>
                </table>
                <a href="reportepac.php" class="btn btn-secondary">Generar Reporte</a>
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
            url:"tablacitas.php",
            data: {buscar: buscar},
            success:function(html){
                $('#tabla_resultado').html(html);
            }
        });
    }
</script>
