<?php
include("conexion.php");
$con = conectar();

$id=$_GET['id'];

$sql="SELECT * FROM paciente WHERE ID_Paciente = '$id'";
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
        <form action="updatepac.php" method="POST">
            <input type="text" class="form-control mb-3" name="dpi" placeholder="Ingrese su DPI" id="dpi" maxlength="13" autocomplete="off" value="<?php echo $row['ID_Paciente'] ?>" required>
            <input type="text" class="form-control mb-3" name="nombre" placeholder="Ingrese su Nombre" id="nombre" autocomplete="off" value="<?php echo $row['Nombres'] ?>" required>
            <input type="text" class="form-control mb-3" name="apellido" placeholder="Ingrese su Apellido" id="apellido" autocomplete="off" value="<?php echo $row['Apellidos'] ?>" required>
            <font color="#000000" size="3" face="Arial">Fecha de Nacimiento</font> 
            <input type="date" class="form-control mb-3" name="fecha" id="fecha" autocomplete="off" value="<?php echo $row['Fecha_Nac'] ?>" required>
            <select name="genero" id="genero" placeholder="Selecciones su Genero"  class="form-select mb-3" required>
            <option selected disabled value="">Seleccione su Genero</option>
            <option <?php if ($row['Genero'] == "Masculino"):?> selected="selected"<?php endif; ?>>Marculino</option>
            <option <?php if ($row['Genero'] == "Femenino"):?> selected="selected"<?php endif; ?>>Femenino</option>
            <input type="text" class="form-control mb-3" name="edad" placeholder="Edad..." id="edad" autocomplete="off" value="<?php echo $row['Edad'] ?>" required>
            <input type="text" class="form-control mb-3" name="direccion" placeholder="Ingrese su Dirección" id="direccion" autocomplete="off" value="<?php echo $row['Direccion'] ?>" required>
            <input type="text" class="form-control mb-3" name="telefono" placeholder="Ingrese su Teléfono" id="telefono" maxlength="8" autocomplete="off" value="<?php echo $row['Telefono'] ?>" required>               
            <input type="text" class="form-control mb-3" name="correo" placeholder="Ingrese su Email" id="correo" autocomplete="off" value="<?php echo $row['Email'] ?>" required>
            <input type="submit" class="btn btn-success" value="Guardar"><br><br>
        </form>
    </div>
</body>
</html>