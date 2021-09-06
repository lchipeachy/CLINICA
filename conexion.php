<?php 

    $mysqli=new mysqli("localhost","root","","clinica");   

    function conectar()
    {
        $host="localhost";
        $user="root";
        $pass="";

        $bd="clinical";

        $con = mysqli_connect($host,$user,$pass);
        mysqli_select_db($con, $bd);
        return $con;
    }

?>