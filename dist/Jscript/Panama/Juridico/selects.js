/**********APARTADO UBICACION GEOGRAFICA**********/
// SCRIPT PARA UBICACION GEOGRAFICA -->
/*
$(document).ready(function(){
    $("#razonSocial_MR_J").on('change', function () {
        $("#razonSocial_MR_J option:selected").each(function () {
            
            var id_pic = $(this).val();
            var id_matriz = $("#matriz").val();
                // recogiendo los datos de pais de constitución
                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_LConstitucion_PJ.php", { id_pic: id_pic, id_matriz: id_matriz }, function(data) {
                    $("#indicador_Constitucion_MR_J").html(data);
                });	

                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_LC_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_Constitucion_MR_J").html(data);
                    $('#calificacion_Constitucion_MR_J').val($("#sbVariable_Constitucion_MR_J").val());  
                });

                //Recogiendo los datos de nacimiento del representante legal
                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacimientoRL_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#indicador_NacimientoRL_MR_J").html(data);
                });	

                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_LNRL_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_NacimientoRL_MR_J").html(data);
                    $('#calificacion_NacimientoRL_MR_J').val($("#sbVariable_NacimientoRL_MR_J").val());  
                });

                //Recogiendo los datos de nacionalidad del representante legal
                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacionalidadRL_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#indicador_NacionalidadRL_MR_J").html(data);
                });	

                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_NacRL_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_NacionalidadRL_MR_J").html(data);
                    $('#calificacion_NacionalidadRL_MR_J').val($("#sbVariable_NacionalidadRL_MR_J").val());  
                });

                //Recogiendo los datos de residencia del representante legal
                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_ResidenciaRL_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#indicador_LResidenciaRL_MR_J").html(data);
                });	

                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_ResidRL_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_LResidenciaRL_MR_J").html(data);
                    $('#calificacion_LResidenciaRL_MR_J').val($("#sbVariable_LResidenciaRL_MR_J").val());  
                });
                
                //Recogiendo los datos de nacionalidad de accionista mayoritario
                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacionalidadACM_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#indicador_NacionalidadAC_MR_J").html(data);
                  
                });	

                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_ACM_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_NacionalidadAC_MR_J").html(data);
                    bandera = $('select[id=sbVariable_NacionalidadAC_MR_J]').val();

                    if (bandera==0){
                        alert("Error al encontrar la nacionalidad del Accionista, verifique Los campos del pic");
                    }

                    $('#calificacion_NacionalidadAC_MR_J').val($("#sbVariable_NacionalidadAC_MR_J").val());  
                });

                //Recogiendo los datos de nacionalidad de Beneficiario Final mayoritario
                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_NacionalidadBFM_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#indicador_NacionalidadBF_MR_J").html(data);
                  
                });	

                $.post("./JQuerys/Panama/MRJ/jQ_UbiGeo_SV_BFM_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_NacionalidadBF_MR_J").html(data);
                    bandera = $('select[id=sbVariable_NacionalidadBF_MR_J]').val();

                    if (bandera==0){
                        //alert("Error al encontrar la nacionalidad del Beneficiario Final, verifique Los campos del pic");
                    }
                    $('#calificacion_NacionalidadBF_MR_J').val($("#sbVariable_NacionalidadBF_MR_J").val());  
                });

               
                
        });    
    });

    $("#sbVariable_Constitucion_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_Constitucion_MR_J]').val());
        $('#calificacion_Constitucion_MR_J').val($(this).val());
    });

    $("#sbVariable_NacimientoRL_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_Constitucion_MR_J]').val());
        $('#calificacion_NacimientoRL_MR_J').val($(this).val());
    });

    $("#sbVariable_NacionalidadRL_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_Constitucion_MR_J]').val());
        $('#calificacion_NacionalidadRL_MR_J').val($(this).val());
    });

    $("#sbVariable_LResidenciaRL_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_LResidenciaRL_MR_J]').val());
        $('#calificacion_LResidenciaRL_MR_J').val($(this).val());
    });

    $("#sbVariable_NacionalidadAC_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_LResidenciaRL_MR_J]').val());
        $('#calificacion_NacionalidadAC_MR_J').val($(this).val());
    });

    $("#sbVariable_NacionalidadBF_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_NacionalidadBF_MR_J]').val());
        $('#calificacion_NacionalidadBF_MR_J').val($(this).val());
    });
});
*/

/**********APARTADO ACTIVIDAD ECONOMICA**********/
// SCRIPT PARA SABER A QUE SE DEDICA LA ENTIDAD -->



$(document).ready(function(){
     
    /*
    //funcion para asignar la personalidad juridica  
    $("#sbVariable_PersonalidadJuridica_MR_J").on('change', function () {
        $('#calificacion_PersonalidadJuridica_MR_J').val($(this).val());
    });

    //Función para determinar constitucion
    $("#sbVariable_FConstitucion_MR_J").on('change', function () {
        $('#calificacion_FConstitucion_MR_J').val($(this).val());
    });
    */

/*
    //función para determinar La actividad economica
    $("#indicador_ActividadEconomica_MR_J").on('change', function () {    
        var id_empleo = $(this).val();
        var id_matriz = $("#paisContitucion_PJ").val();
    
         alert($('input[id=paisContitucion_PJ]').val());

            $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_ActiEconomica_PJ.php", { id_empleo: id_empleo, id_matriz: id_matriz }, function(data) {
                $("#sbVariable_ActividadEconomica_MR_J").html(data);
                $('#calificacion_ActividadEconomica_MR_J').val($("#sbVariable_ActividadEconomica_MR_J").val());
                  
            });	
    });  
    */   

    //función para determinar si el negocio es nacional o internacional
    $("#indicador_LActividadEconomica_MR_J").on('change', function () {    
        var id_lugar = $(this).val();
            $.post("./JQuerys/Panama/MRJ/JQ_departamentos.php", { id_lugar: id_lugar }, function(data) {
                $("#sbVariable_LActividadEconomica_MR_J").html(data);

                $('#calificacion_LActividadEconomica_MR_J').val($("#sbVariable_LActividadEconomica_MR_J").val());
                  
            });	
    });  
     
    //dependiente si el negocio es nacional cambia la calificación en el input
    $("#sbVariable_LActividadEconomica_MR_J").on('change', function () {
        $('#calificacion_LActividadEconomica_MR_J').val($(this).val());
    });

    /*
    //Función para determinar la categoría
    $("#sbVariable_ResultadosBusquedas_MR_J").on('change', function () {
        $('#calificacion_ResultadosBusquedas_MR_J').val($(this).val());
    });
    */

    //función para determinar la condición PEP
    $("#razonSocial_MR_J").on('change', function () {
        $("#razonSocial_MR_J option:selected").each(function () {
            var id_pic = $(this).val();
               
                $.post("./JQuerys/Panama/MRJ/jQ_ActEcono_Pep_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_CondicionPep_MR_J").html(data);
                    //alert($('select[id=sbVariable_CondicionPep_MR_J]').val());
                    $('#calificacion_CondicionPep_MR_J').val($("#sbVariable_CondicionPep_MR_J").val());  
                });                           
        });    
    });
});

/**********APARTADO PRODUCTO**********/
//SCRIPT PARA EL PRODUCTO SOLICITADO
$(document).ready(function(){
    $("#indicador_ProductoSolicitado_MR_J").on('change', function () {
        $("#indicador_ProductoSolicitado_MR_J option:selected").each(function () {
            
            var id_categoria = $(this).val();
                
                $.post("./JQuerys/Panama/MRJ/jQ_Produc_PSolic_PJ.php", { id_categoria: id_categoria }, function(data) {
                    $("#sbVariable_ProductoSolicitado_MR_J").html(data);
                    
                    $('#calificacion_ProductoSolicitado_MR_J').val($("#sbVariable_ProductoSolicitado_MR_J").val());
                });	         
        });
    });
    $("#sbVariable_ProductoSolicitado_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_LResidencia_MR_N]').val());
        $('#calificacion_ProductoSolicitado_MR_J').val($(this).val());
    });

    $("#sbVariable_Monto_MR_J").on('change', function () {
        //alert($('select[id=sbVariable_LResidencia_MR_N]').val());
        $('#calificacion_Monto_MR_J').val($(this).val());
    });

});

/**********APARTADO CANAL DE PAGO**********/
//SCRIPT PARA CONCER EL CANAL DE PAGO
$(document).ready(function(){
    $("#razonSocial_MR_J").on('change', function () {
        $("#razonSocial_MR_J option:selected").each(function () {
            
            var id_pic = $(this).val();

                $.post("./JQuerys/Panama/MRJ/jQ_CanalPago_FPago_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_FormaPago_MR_J").html(data);
                    $('#calificacion_FormaPago_MR_J').val($("#sbVariable_FormaPago_MR_J").val());
                });	

                $.post("./JQuerys/Panama/MRJ/jQ_CanalPago_FFondos_PJ.php", { id_pic: id_pic }, function(data) {
                    $("#sbVariable_OrigenesRecursos_MR_J").html(data);
                    $('#calificacion_OrigenesRecursos_MR_J').val($("#sbVariable_OrigenesRecursos_MR_J").val());
                });	
        });
    });
});