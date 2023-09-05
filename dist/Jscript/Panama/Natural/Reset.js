
/************************************************************************************* */
function Reset() {
    
    document.getElementById("myForm").reset();
    
    //INDICADORES
    document.getElementById('indicador_LNacimiento_MR_N').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
    document.getElementById('indicador_Nacionalidad_MR_N').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';
    document.getElementById('indicador_LResidencia_MR_N').innerHTML = '<option selected disabled>Elegir...</option> <option>Nacional</option> <option>Internacional</option> ';

    //SUBVARIABLES
    document.getElementById('sbVariable_LNacimiento_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_Nacionalidad_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_LResidencia_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_Profesion_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_Empleo_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_LActividadEconomica_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_CondicionPep_MR_N').innerHTML = '<option selected disabled>Elegir...</option> <option >Sí</option> <option>No</option>';
    document.getElementById('sbVariable_ProductoSolicitado_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_FormaPago_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    document.getElementById('sbVariable_OrigenesRecursos_MR_N').innerHTML = '<option selected disabled>Elegir...</option>';
    
    //RIESGO
    document.getElementById("riesgo").style.backgroundColor = "#FFFFFF";
    document.getElementById('etiqueta').innerHTML = 'Riesgo';

    //SELECT MATRIZ GENERAL
    document.getElementById('matriz').innerHTML = '<option selected disabled>Elegir...</option> <option value="5">Guatemala</option> <option value="3">El Salvador</option> <option value="4">Honduras</option> <option value="1">Nicaragua</option> <option value="6">Costa Rica</option> <option value="2">Panamá</option>';


};

