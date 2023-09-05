

/**********APARTADO UBICACION ACTIVIDAD ECONOMICA**********/
//SCRIPT PARA SABER LA ACTIVIDAD ECONOMICA
$(document).ready(function(){
            
    /*
    //función para determinar la profesion a traves de un input
    $("#indicador_Profesion_MR_N").on('change', function () {    
        var id_profesion = $(this).val();
            $.post("./JQuerys/Panama/MRN/jQ_ActEcono_Profesion_PN.php", { id_profesion: id_profesion }, function(data) {
                $("#sbVariable_Profesion_MR_N").html(data);
                $('#calificacion_Profesion_MR_N').val($("#sbVariable_Profesion_MR_N").val());
                  
            });	
    });

    */
/*
    //función para determinar el empleo a través de input UPDATE(30/9/2022)
    $("#indicador_Empleo_MR_N").on('change', function () {    
        var id_empleo = $(this).val();
        var id_matriz = $("#matriz").val();
        
            $.post("./JQuerys/Panama/MRN/jQ_ActEcono_Empleo_PN.php", { id_empleo: id_empleo, id_matriz: id_matriz }, function(data) {
                $("#sbVariable_Empleo_MR_N").html(data);
                $('#calificacion_Empleo_MR_N').val($("#sbVariable_Empleo_MR_N").val());
                  
            });	
    });

    */

    //función para determinar si el negocio es nacional o internacional
    $("#indicador_LActividadEconomica_MR_N").on('change', function () {    
        var id_lugar = $(this).val();

            $.post("./JQuerys/Panama/MRN/JQ_departamentos.php", { id_lugar: id_lugar }, function(data) {
                $("#sbVariable_LActividadEconomica_MR_N").html(data);
                $('#calificacion_LActividadEconomica_MR_N').val($("#sbVariable_LActividadEconomica_MR_N").val());
                  
            });	
    });

    /*
    //dependiente si el negocio es nacional cambia la calificación en el input
    $("#sbVariable_LActividadEconomica_MR_N").on('change', function () {
        $('#calificacion_LActividadEconomica_MR_N').val($(this).val());
    });
    */
/*
    //script para determinar la categoría
    $("#sbVariable_ResultadosBusquedas_MR_N").on('change', function () {
        $('#calificacion_ResultadosBusquedas_MR_N').val($(this).val());
    });
    */

    //función para determinar la condición PEP
    $("#razonSocial_MR_N").on('change', function () {
        $("#razonSocial_MR_N option:selected").each(function () {
            
            var id_pic = $(this).val();
               
                $.post("./JQuerys/Panama/MRN/jQ_ActEcono_Pep_PN.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_CondicionPep_MR_N").html(data);
                    $('#calificacion_CondicionPep_MR_N').val($("#sbVariable_CondicionPep_MR_N").val());  
                });                           
        });    
    });
});

/**********APARTADO PRODUCTO**********/
//SCRIPT PARA EL PRODUCTO SOLICITADO
$(document).ready(function(){
    $("#indicador_ProductoSolicitado_MR_N").on('change', function () {
        $("#indicador_ProductoSolicitado_MR_N option:selected").each(function () {
            
            var id_categoria = $(this).val();
                
                $.post("./JQuerys/Panama/MRN/jQ_Produc_PSolic_PN.php", { id_categoria: id_categoria }, function(data) {
                    $("#sbVariable_ProductoSolicitado_MR_N").html(data);         
                    $('#calificacion_ProductoSolicitado_MR_N').val($("#sbVariable_ProductoSolicitado_MR_N").val());
                    
                });	         
        });
    });
    $("#sbVariable_ProductoSolicitado_MR_N").on('change', function () {
        $('#calificacion_ProductoSolicitado_MR_N').val($(this).val());
    });

    $("#sbVariable_Monto_MR_N").on('change', function () {
        $('#calificacion_Monto_MR_N').val($(this).val());
    });

});

/**********APARTADO CANAL DE PAGO**********/
//SCRIPT PARA CONCER EL CANAL DE PAGO

$(document).ready(function(){
    $("#razonSocial_MR_N").on('change', function () {
        $("#razonSocial_MR_N option:selected").each(function () {
            
            var id_pic = $(this).val();

                $.post("./JQuerys/Panama/MRN/jQ_CanalPago_FPago_PN.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_FormaPago_MR_N").html(data);
                    $('#calificacion_FormaPago_MR_N').val($("#sbVariable_FormaPago_MR_N").val());

                });	
                $.post("./JQuerys/Panama/MRN/jQ_CanalPago_FFondos_PN.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_OrigenesRecursos_MR_N").html(data);
                    $('#calificacion_OrigenesRecursos_MR_N').val($("#sbVariable_OrigenesRecursos_MR_N").val());

                });	

                //SCRIPT PARA OBTENER LA CATEGORIA OCUPACIONAL
                $.post("./JQuerys/Panama/MRN/jQ_ActEcono_SV_CatIngreso.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_Categoria_MR_N").html(data);
                    $('#calificacion_Categoria_MR_N').val($("#sbVariable_Categoria_MR_N").val());
                    

                });	
        });
    });
});