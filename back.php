<?php
    include("conexion.php");
    $con = conectar();

    $termino = isset($_POST['buscar']) ? $_POST['buscar'] : '';

    $sql="SELECT * FROM medico WHERE
        Nombres LIKE '%".$termino."%' OR
        Apellidos LIKE '%".$termino."%' OR
        Especialidad LIKE '%".$termino."%'";
    $query = mysqli_query($con, $sql);

    $cadena = "";

    while($row = mysqli_fetch_array($query)){
        $cadena = $cadena . '<tr>';
            $cadena = $cadena . '<td>' . $row['ID_Medico'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Nombres'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Apellidos'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Direccion'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Telefono'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Email'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Especialidad'] . '</td>';

            $cadena = $cadena . '<td> <a href="actualizardoc.php?id= '. $row['ID_Medico'] . ' " class="btn btn-info">Editar</a></td> ';
            $cadena = $cadena . '<td> <a href="eliminardoc.php?id= ' . $row['ID_Medico'] . '   " class="btn btn-danger">Eliminar</a></td> ';
        $cadena = $cadena . '</tr>';
    }

    echo ($cadena);

?>