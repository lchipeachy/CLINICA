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
    <h2 class="color">Actualización de Datos</h2>
    <div class="container mt-5">
        <form action="guardarconsulta.php" method="POST">
            <input type="hidden" name="ID_Paciente" value="<?php echo $row['ID_Paciente'] ?>">
            <input type="hidden" name="ID_Medico" value="<?php echo $row['ID_Medico'] ?>">
            <input type="hidden" name="Fecha" value="<?php echo $row['Fecha'] ?>">

            <textarea type="hidden" class="form-control mb-3" name="Diagnostico" placeholder="Ingrese el diagnostico" id="Diagnostico" ></textarea>

            <textarea type="hidden" class="form-control mb-3" name="Tratamiento" placeholder="Ingrese el Tratamiento" id="Tratamiento" ></textarea>
        
            <input type="submit" class="btn btn-success" value="Guardar"><br><br>
        </form>
    </div>
</body>
</html>