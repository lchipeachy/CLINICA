<?php
    require_once "conexion.php";

    $tabla="";
    $consulta ="SELECT * FROM medico LIMIT 0";
    $termino="";
    $termino = isset($_POST['buscar']) ? $_POST['buscar'] : '';

    if(isset($_POST['productos']))
    {
        $termino=$mysqli->real_scape_string($_POST['productos']);
        $consulta="SELECT * FROM medico WHERE
        Nombres LIKE '%".$termino."%' OR
        Apellidos LIKE '%".$termino."%' OR
        Especialidad LIKE '%".$termino."%'";
    }

    $consultaBD=$mysqli->query($consulta);

    if($consultaBD->num_rows>=1){
        echo "
        <table class='responseive-table table table-hover table-bordered'>
        <thread>
        <tr>
        <th class='bg-info' scope='col'>DPI<th>
        <th class='bg-info' scope='col'>Nombres<th>
        <th class='bg-info' scope='col'>Apellidos<th>
        <th class='bg-info' scope='col'>Direccion<th>
        <th class='bg-info' scope='col'>Teléfono<th>
        <th class='bg-info' scope='col'>Email<th>
        <th class='bg-info' scope='col'>Especialidad<th>
        </tr>
        </thread><br>
        <tbody>";

        while($fila=$consultaBD->fetch_array(MYSQLI_ASSOC)){
            echo "<tr>
            <td>" $fila['Nombres']."</td>
            <td>" $fila['Apellidos']."</td>
            <td>" $fila['Direccion']."</td>
            <td>" $fila['Telefono']."</td>
            <td>" $fila['Email']."</td>
            <td>" $fila['Especialidad']."</td>
            </tr>";
        }
        echo "</tbody>
        </table>";
    }
    else
    {
        echo "<center><h4> No se ha encontrado ningun registro con la palabra"."<strong class ='text-uppercase'>".$termino."</strong><h4><center>";
    }
?>