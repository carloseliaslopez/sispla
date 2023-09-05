$(document).ready(function(){

   

    $("#paisDominicilio_AE").on('change', function () {
        $("#paisDominicilio_AE option:selected").each(function () {
            var id_pais = $(this).val();
            
            $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
               
                $("#departamento").html(data);
                //alert($('select[id=departamento]').val());
            });			
        });
    });

    $("#interes_LAE").on('change', function () {
        $("#interes_LAE option:selected").each(function () {
            var id_pais = $(this).val();
            
            $.post("./JQ_departamentos.php", { id_pais: id_pais }, function(data) {
               
                $("#interes_depto_LAE").html(data);
                //alert($('select[id=departamento]').val());
            });			
        });
    });


});

