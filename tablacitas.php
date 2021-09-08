<?php
    include("conexion.php");
    $con = conectar();

    $termino = isset($_POST['buscar']) ? $_POST['buscar'] : '';

    $sql="select ID_Cita, citas.ID_Medico, concat_ws(' ', medico.Nombres, medico.Apellidos) as 'Medico', Especialidad, citas.ID_Paciente, concat_ws(' ', paciente.Nombres, paciente.Apellidos) as 'Paciente', Fecha, Hora 
            from citas
            inner join medico on citas.ID_Medico = medico.ID_Medico
            inner join paciente on citas.ID_Paciente = paciente.ID_Paciente";
    $query = mysqli_query($con, $sql);

    $cadena = "";

    while($row = mysqli_fetch_array($query)){
            $cadena = $cadena . '<tr>';
            $cadena = $cadena . '<td>' . $row['Medico'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Especialidad'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Paciente'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Fecha'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Hora'] . '</td>';

            $cadena = $cadena . '<td> <a href="actualizarcita.php?id= '. $row['ID_Cita'] . ' " class="btn btn-info">Editar</a></td> ';
            $cadena = $cadena . '<td> <a href="eliminardoc.php?id= ' . $row['ID_Cita'] . '   " class="btn btn-danger">Eliminar</a></td> ';
        $cadena = $cadena . '</tr>';
    }

    echo ($cadena);

?>