<?php
    include("conexion.php");
    $con = conectar();

    $termino = isset($_POST['buscar']) ? $_POST['buscar'] : '';

    $sql="SELECT * FROM paciente WHERE
        Nombres LIKE '%".$termino."%' OR
        Apellidos LIKE '%".$termino."%' OR
        Email LIKE '%".$termino."%'";
    $query = mysqli_query($con, $sql);

    $cadena = "";

    while($row = mysqli_fetch_array($query)){
        $cadena = $cadena . '<tr>';
            $cadena = $cadena . '<td>' . $row['ID_Paciente'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Nombres'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Apellidos'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Fecha_Nac'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Genero'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Edad'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Direccion'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Telefono'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Email'] . '</td>';

            $cadena = $cadena . '<td> <a href="actualizarpac.php?id= '. $row['ID_Paciente'] . ' " class="btn btn-info">Editar</a></td> ';
            $cadena = $cadena . '<td> <a href="eliminarpac.php?id= ' . $row['ID_Paciente'] . '   " class="btn btn-danger">Eliminar</a></td> ';
        $cadena = $cadena . '</tr>';
    }

    echo ($cadena);

?>