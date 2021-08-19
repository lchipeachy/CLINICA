<?php
include("conexion.php");
$con = conectar();

$id=$_GET['id'];

$sql="SELECT * FROM medico WHERE ID_Medico = '$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
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
    <h2 class="color">Actualizar Datos</h2>
    <div class="container mt-5">
        <form action="updatedoc.php" method="POST">
            <input type="hidden" name="dpi" value="<?php echo $row['ID_Medico'] ?>">
            <input type="text" class="form-control mb-3" name="nombre" autocomplete="off" value="<?php echo $row['Nombres'] ?>" required>
            <input type="text" class="form-control mb-3" name="apellido" autocomplete="off" value="<?php echo $row['Apellidos'] ?>" required>
            <input type="text" class="form-control mb-3" name="direccion" autocomplete="off" value="<?php echo $row['Direccion'] ?>" required>
            <input type="text" class="form-control mb-3" name="telefono" autocomplete="off" maxlength="8" value="<?php echo $row['Telefono'] ?>" required>               
            <input type="text" class="form-control mb-3" name="correo" autocomplete="off" value="<?php echo $row['Email'] ?>" required>
            <select name="especialidad" id="especialidad" class="form-select mb-3" value="<?php echo $row['Especialidad'] ?>">
                <option selected disabled value="">Seleccione su Especialidad</option>
                <option <?php if ($row['Especialidad'] == "Cirugia General"):?> selected="selected"<?php endif; ?>>Cirugia General</option>
                <option <?php if ($row['Especialidad'] == "Anestesiologo"):?> selected="selected"<?php endif; ?>>Anestesiologo</option>
                <option <?php if ($row['Especialidad'] == "Ginecologo / Obstetra"):?> selected="selected"<?php endif; ?>>Ginecologo / Obstetra</option>
                <option <?php if ($row['Especialidad'] == "Pediatra"):?> selected="selected"<?php endif; ?>>Pediatra</option>
                <option <?php if ($row['Especialidad'] == "Urologo"):?> selected="selected"<?php endif; ?>>Urologo</option>
                <option <?php if ($row['Especialidad'] == "Alergologo"):?> selected="selected"<?php endif; ?>>Alergologo</option>
                <option <?php if ($row['Especialidad'] == "Cardiologo"):?> selected="selected"<?php endif; ?>>Cardiologo</option>
                <option <?php if ($row['Especialidad'] == "Endocrinologo"):?> selected="selected"<?php endif; ?>>Endocrinologo</option>
                <option <?php if ($row['Especialidad'] == "Gastroenterologo"):?> selected="selected"<?php endif; ?>>Gastroenterologo</option>
                <option <?php if ($row['Especialidad'] == "Neumologo"):?> selected="selected"<?php endif; ?>>Neumologo</option>
            </select>   
            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
        </form>
    </div>
</body>
</html>