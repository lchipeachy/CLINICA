    var buscar = "";

    $(document).ready(function(){
        buscar = $('#buscar').val();
        ejecutar();

        $("#buscar").on("input", function(){
            buscar = $(this).val();
            ejecutar();
        });
    });

    function ejecutar(){
        $ajax({
            type:"POST",
            url:"back.php",
            data: {buscar: buscar},
            success:function(html){
                $('#tabla_resultado').html(html);
            }

        });
    }