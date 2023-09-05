function multiplicar(){
    //START UBICACION  GEOGRAFICA
    Fila1 = document.getElementById("calificacion_Constitucion_MR_J").value * document.getElementById("PV_Constitucion_MR_J_Val").value;
    document.getElementById("valor_Contitucion_MR_J").value =  Number.parseFloat(Fila1).toFixed(2);

    Fila2 = document.getElementById("calificacion_NacimientoRL_MR_J").value * document.getElementById("PV_NacimientoRL_MR_J_Val").value;
    document.getElementById("valor_NacimientoRL_MR_J").value =  Number.parseFloat(Fila2).toFixed(2);

    Fila3 = document.getElementById("calificacion_NacionalidadRL_MR_J").value * document.getElementById("PV_NacionalidadRL_MR_J_Val").value;
    document.getElementById("valorNacionalidadRL_MR_J").value =  Number.parseFloat(Fila3).toFixed(2);

    Fila4 = document.getElementById("calificacion_LResidenciaRL_MR_J").value * document.getElementById("PV_LResidenciaRL_MR_J_Val").value;
    document.getElementById("valor_LResidenciaRL_MR_J").value =  Number.parseFloat(Fila4).toFixed(2);

    Fila5 = document.getElementById("calificacion_NacionalidadAC_MR_J").value * document.getElementById("PV_NacionalidadAC_MR_J_Val").value;
    document.getElementById("valor_NacionalidadAC_MR_J").value =  Number.parseFloat(Fila5).toFixed(2);

    Fila6 = document.getElementById("calificacion_NacionalidadBF_MR_J").value * document.getElementById("PV_NacionalidadBF_MR_J_Val").value;
    document.getElementById("valor_NacionalidadBF_MR_J").value =  Number.parseFloat(Fila6).toFixed(2);

    UbiGeoSuma= Fila1 + Fila2 + Fila3 + Fila4 + Fila5 + Fila6;
    document.getElementById("pesoFinal_AG_MR_J").value = Number.parseFloat(UbiGeoSuma).toFixed(2);
    
    UbiGeoValFinal= document.getElementById("pesoFinal_AG_MR_J").value * document.getElementById("ubicacionG_MR_J_Val").value;
    document.getElementById("valorFinal_AG_MR_J").value = Number.parseFloat(UbiGeoValFinal).toFixed(2);

    //START ACTIVIDAD ECONOMICA
    Fila7 = document.getElementById("calificacion_PersonalidadJuridica_MR_J").value * document.getElementById("PV_PJuridica_MR_J_Val").value;
    document.getElementById("valor_PersonalidadJuridica_MR_J").value =  Number.parseFloat(Fila7).toFixed(2);
    
    Fila8 = document.getElementById("calificacion_FConstitucion_MR_J").value * document.getElementById("PV_FConstitucion_MR_J_Val").value;
    document.getElementById("valor_FConstitucion_MR_J").value =  Number.parseFloat(Fila8).toFixed(2);

    Fila9 = document.getElementById("calificacion_ActividadEconomica_MR_J").value * document.getElementById("PV_ActividadEconomica_MR_J_Val").value;
    document.getElementById("valor_ActividadEconomica_MR_J").value =  Number.parseFloat(Fila9).toFixed(2);

    Fila10 = document.getElementById("calificacion_LActividadEconomica_MR_J").value * document.getElementById("PV_LActividadEconomica_MR_J_Val").value;
    document.getElementById("valor_LActividadEconomica_MR_J").value =  Number.parseFloat(Fila10).toFixed(2);

    Fila11 = document.getElementById("calificacion_ResultadosBusquedas_MR_J").value * document.getElementById("PV_ResultadosBusquedas_MR_J_Val").value;
    document.getElementById("valor_ResultadosBusquedas_MR_J").value =  Number.parseFloat(Fila11).toFixed(2);
    
    Fila12 = document.getElementById("calificacion_CondicionPep_MR_J").value * document.getElementById("PV_CondicionPep_MR_J_Val").value;
    document.getElementById("valor_CondicionPep_MR_J").value =  Number.parseFloat(Fila12).toFixed(2);
    
    ActEcoSuma= Fila7  + Fila8 + Fila9 + Fila10 + Fila11 +  Fila12;
    document.getElementById("pesoFinal_AC_MR_J").value = Number.parseFloat(ActEcoSuma).toFixed(2);
    
    ActEcoValFinal= document.getElementById("pesoFinal_AC_MR_J").value * document.getElementById("ACGeneral_MR_J_Val").value;
    document.getElementById("valorFinal_AC_MR_J").value = Number.parseFloat(ActEcoValFinal).toFixed(2);

    //START PRODUCTO
    Fila13 = document.getElementById("calificacion_ProductoSolicitado_MR_J").value * document.getElementById("PV_ProductoSolicitado_MR_J_Val").value;
    document.getElementById("valor_ProductoSolicitado_MR_J").value =  Number.parseFloat(Fila13).toFixed(2);

    Fila14 = document.getElementById("calificacion_Monto_MR_J").value * document.getElementById("PV_Monto_MR_J_Val").value;
    document.getElementById("valor_Monto_MR_J").value =  Number.parseFloat(Fila14).toFixed(2);

    ProductoSuma= Fila13  + Fila14 ;
    document.getElementById("pesoFinal_Monto_MR_J").value = Number.parseFloat(ProductoSuma).toFixed(2);
    
    ProductoValFinal= document.getElementById("pesoFinal_Monto_MR_J").value * document.getElementById("productoGeneral_MR_J_Val").value;
    document.getElementById("valorFinal_Monto_MR_J").value = Number.parseFloat(ProductoValFinal).toFixed(2);

    //START CANAL DE PAGO
    Fila15 = document.getElementById("calificacion_FormaPago_MR_J").value * document.getElementById("PV_FormaPago_MR_J_Val").value;
    document.getElementById("valor_FormaPago_MR_J").value =  Number.parseFloat(Fila15).toFixed(2);

    Fila16 = document.getElementById("calificacion_OrigenesRecursos_MR_J").value * document.getElementById("PV_OrigenesRecursos_MR_J_Val").value;
    document.getElementById("valor_OrigenesRecursos_MR_J").value =  Number.parseFloat(Fila16).toFixed(2);

    CpagoSuma= Fila15  + Fila16 ;
    document.getElementById("pesoFinal_OrigenesRecursos_MR_J").value = Number.parseFloat(CpagoSuma).toFixed(2);
    
    CpagoValFinal= document.getElementById("pesoFinal_OrigenesRecursos_MR_J").value * document.getElementById("canalPago_MR_J_Val").value;
    document.getElementById("valorFinal_OrigenesRecursos_MR_J").value = Number.parseFloat(CpagoValFinal).toFixed(2);

    //TRATABAJANDO EN EL RIESGO FINAL
    var RiesgoFinal;
    RiesgoFinal = UbiGeoValFinal + ActEcoValFinal + ProductoValFinal + CpagoValFinal ;

    if (RiesgoFinal>= 0.01 && RiesgoFinal<=1.99 ){
        document.getElementById("riesgo").style.backgroundColor = "#00b050";
        s = document.getElementById('etiqueta').innerHTML = 'Bajo';
        document.getElementById("riesgoCliente").value = s;

        }else if (RiesgoFinal>= 2  && RiesgoFinal<=2.99) {
            document.getElementById("riesgo").style.backgroundColor = "#ffff00";
            s = document.getElementById('etiqueta').innerHTML = 'Medio';
            document.getElementById("riesgoCliente").value = s;

            } else if(RiesgoFinal>=3){
                document.getElementById("riesgo").style.backgroundColor = "#ff0000";
                s = document.getElementById('etiqueta').innerHTML = 'Alto';
                document.getElementById("riesgoCliente").value = s;

            }else{
                document.getElementById("riesgo").style.backgroundColor = "#808080";
            }
    document.getElementById("puntuacionFinal_MR_J").value = Number.parseFloat(RiesgoFinal).toFixed(2);
    
    //ESTABLECER PARAMETROS DE TIPO TEXTO PARA LA MATRIZ DE INFORME GENERAL
    b = document.getElementById("razonSocial_MR_J");
    cliente = b.options[b.selectedIndex].text;
    document.getElementById("cliente").value = cliente;

    a = document.getElementById("razonSocial_MR_J");
    idcliente = a.options[a.selectedIndex].value;
    document.getElementById("idCliente").value = idcliente;
    
    c = document.getElementById("sbVariable_Constitucion_MR_J");
    lugarConstitucion = c.options[c.selectedIndex].text;
    document.getElementById("lugarConstitucion").value = lugarConstitucion;

    d = document.getElementById("sbVariable_NacimientoRL_MR_J");
    lugarNacimiento_RL = d.options[d.selectedIndex].text;
    document.getElementById("lugarNacimiento_RL").value = lugarNacimiento_RL;

    e = document.getElementById("sbVariable_NacionalidadRL_MR_J");
    lugarNacionalidad_RL = e.options[e.selectedIndex].text;
    document.getElementById("lugarNacionalidad_RL").value = lugarNacionalidad_RL;

    f = document.getElementById("sbVariable_LResidenciaRL_MR_J");
    lugarResidencia_RL = f.options[f.selectedIndex].text;
    document.getElementById("lugarResidencia_RL").value = lugarResidencia_RL;
    
    g = document.getElementById("sbVariable_NacionalidadAC_MR_J");
    lugarNacionalidad_ACM = g.options[g.selectedIndex].text;
    document.getElementById("lugarNacionalidad_ACM").value = lugarNacionalidad_ACM;

    h = document.getElementById("sbVariable_NacionalidadBF_MR_J");
    lugarNacionalidad_BFM = h.options[h.selectedIndex].text;
    document.getElementById("lugarNacionalidad_BFM").value = lugarNacionalidad_BFM;
    
    /*           
    */          

    i = document.getElementById("sbVariable_LActividadEconomica_MR_J");
    lugarActividadEconomica = i.options[i.selectedIndex].text;
    document.getElementById("lugarActividadEconomica").value = lugarActividadEconomica;

    j = document.getElementById("sbVariable_ResultadosBusquedas_MR_J");
    resultadosBusquedas = j.options[j.selectedIndex].text;
    document.getElementById("resultadosBusquedas").value = resultadosBusquedas;

    k = document.getElementById("sbVariable_CondicionPep_MR_J");
    condicionPEP = k.options[k.selectedIndex].text;
    document.getElementById("condicionPEP").value = condicionPEP;

    l = document.getElementById("sbVariable_ProductoSolicitado_MR_J");
    productoSolicitado = l.options[l.selectedIndex].text;
    document.getElementById("productoSolicitado").value = productoSolicitado;

    o = document.getElementById("sbVariable_Monto_MR_J");
    monto = o.options[o.selectedIndex].text;
    document.getElementById("monto").value = monto;

    p = document.getElementById("sbVariable_FormaPago_MR_J");
    formaPago = p.options[p.selectedIndex].text;
    document.getElementById("formaPago").value = formaPago;

    q = document.getElementById("sbVariable_OrigenesRecursos_MR_J");
    origenRecursos = q.options[q.selectedIndex].text;
    document.getElementById("origenRecursos").value = origenRecursos;
    /*

    */
    s = document.getElementById("sbVariable_PersonalidadJuridica_MR_J");
    personalidadJuridica = s.options[s.selectedIndex].text;
    document.getElementById("personalidadJuridica").value = personalidadJuridica;
    
    t = document.getElementById("sbVariable_FConstitucion_MR_J");
    fechaConstitucion = t.options[t.selectedIndex].text;
    document.getElementById("fechaConstitucion").value = fechaConstitucion;

    u = document.getElementById("sbVariable_ActividadEconomica_MR_J");
    actividadEconomica = u.options[u.selectedIndex].text;
    document.getElementById("actividadEconomica").value = actividadEconomica;


    function cambiarEndDate(){

        var riesgo =document.getElementById("etiqueta").value;
        var inicio=document.getElementById("fechaRevision_ME").value;
        
        if (riesgo == "Bajo"){
            var start = new Date(inicio);
            start.setFullYear(start.getFullYear() + 5);          
            var startf = start.toISOString().slice(0,10).replace("/-/","/");
            document.getElementById("fechaProxRevision_ME").value= startf;
        }

        if (riesgo == "Medio"){
            var inicio=document.getElementById("fechaRevision_ME").value;
            var start = new Date(inicio);
            start.setFullYear(start.getFullYear() + 2);          
            var startf = start.toISOString().slice(0,10).replace("/-/","/");
            document.getElementById("fechaProxRevision_ME").value= startf;
        }

        if (riesgo == "Alto"){
            var inicio=document.getElementById("fechaRevision_ME").value;
            var start = new Date(inicio);
            start.setFullYear(start.getFullYear() + 1);          
            var startf = start.toISOString().slice(0,10).replace("/-/","/");
            document.getElementById("fechaProxRevision_ME").value= startf;
        }
         
    }
   
}