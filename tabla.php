<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div>
        <input type="input" id="buscar">
    </div>
    <div>
        <table>
            <thead> 
                <tr>
                    <th>DPI</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Especialidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="tabla_resultado">

            </tbody>
        </table>
    </div>
</body>
</html>
<script>
    var buscar = "";

    $(document).ready(function(){
        ejecutar();

        $("#buscar").on("input", function(){
            buscar = $(this).val();
            ejecutar();
        });
    });

    function ejecutar(){
        $.ajax({
            type:"POST",
            url:"back.php",
            data: {buscar: buscar},
            success:function(html){
                $('#tabla_resultado').html(html);
            }

        });
    }
</script>