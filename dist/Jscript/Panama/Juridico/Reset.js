

    function Reset() {
        document.getElementById("myForm").reset();
        //INDICADORES
        document.getElementById('indicador_Constitucion_MR_J').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
        document.getElementById('indicador_NacimientoRL_MR_J').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
        document.getElementById('indicador_NacionalidadRL_MR_J').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
        document.getElementById('indicador_LResidenciaRL_MR_J').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
        document.getElementById('indicador_NacionalidadAC_MR_J').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
        document.getElementById('indicador_NacionalidadBF_MR_J').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
    
        //SUBVARIABLES
        document.getElementById('sbVariable_Constitucion_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_NacimientoRL_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_NacionalidadRL_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_LResidenciaRL_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_NacionalidadAC_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_NacionalidadBF_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_ActividadEconomica_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_LActividadEconomica_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_CondicionPep_MR_J').innerHTML = '<option selected disabled>Elegir...</option> <option >Sí</option> <option>No</option>';
        document.getElementById('sbVariable_ProductoSolicitado_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_FormaPago_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        document.getElementById('sbVariable_OrigenesRecursos_MR_J').innerHTML = '<option selected disabled>Elegir...</option>';
        
        //RIESGO
        document.getElementById("riesgo").style.backgroundColor = "#FFFFFF";
        document.getElementById('etiqueta').innerHTML = 'Riesgo';
        
        document.getElementById('showMatriz').hidden();
    }