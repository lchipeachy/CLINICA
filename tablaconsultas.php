<?php
    include("conexion.php");
    $con = conectar();

    $termino = isset($_POST['buscar']) ? $_POST['buscar'] : '';

    $sql="select ID_Consulta, consulta.ID_Medico, Fecha, concat_ws(' ', medico.Nombres, medico.Apellidos) as 'Medico', Especialidad, consulta.ID_Paciente, concat_ws(' ', paciente.Nombres, paciente.Apellidos) as 'Paciente', Diagnostico, Tratamiento, Precio
            from consulta
            inner join medico on consulta.ID_Medico = medico.ID_Medico 
            inner join paciente on consulta.ID_Paciente = paciente.ID_Paciente";
    $query = mysqli_query($con, $sql);

    $cadena = "";

    while($row = mysqli_fetch_array($query)){
            $cadena = $cadena . '<tr>';
            $cadena = $cadena . '<td>' . $row['ID_Consulta'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Medico'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Especialidad'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Paciente'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Telefono'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Email'] . '</td>';
            $cadena = $cadena . '<td>' . $row['Especialidad'] . '</td>';

            $cadena = $cadena . '<td> <a href="actualizardoc.php?id= '. $row['ID_Medico'] . ' " class="btn btn-info">Editar</a></td> ';
            $cadena = $cadena . '<td> <a href="eliminardoc.php?id= ' . $row['ID_Medico'] . '   " class="btn btn-danger">Eliminar</a></td> ';
        $cadena = $cadena . '</tr>';
    }

    echo ($cadena);

?>