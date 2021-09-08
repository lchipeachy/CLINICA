<?php
include("conexion.php");
$con = conectar();

$id=$_GET['id'];

$sql="SELECT * FROM citas WHERE ID_Cita = '$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

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
            <form action="guardarpacientes.php" method="POST">
                <input type="text" class="form-control mb-3" list="listPac">
                <datalist id="listPac">
                    <?php while($row = mysqli_fetch_array($queryPacientes)){ ?>
                    <option value="<?=$row['ID_Paciente']; ?>"><?=$row['Nombres'] . ' ' . $row['Apellidos']; ?></option>
                    <?php } ?>
                </datalist>
                <input type="text" class="form-control mb-3" list="listDoc">
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
    </body>
</html>