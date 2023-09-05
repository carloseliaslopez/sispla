function multiplicar(){
    //START UBICACION  GEOGRAFICA


    Fila1 = document.getElementById("calificacion_Constitucion_MR_N").value * document.getElementById("PV_LNacimiento_MR_N_Val").value;
    document.getElementById("valor_LNacimiento_MR_N").value =  Number.parseFloat(Fila1).toFixed(2);

    Fila2 = document.getElementById("calificacion_Nacionalidad_MR_N").value * document.getElementById("PV_Nacionalidad_MR_N_Val").value;
    document.getElementById("valor_Nacionalidad_MR_N").value =  Number.parseFloat(Fila2).toFixed(2);

    Fila3 = document.getElementById("calificacion_LResidencia_MR_N").value * document.getElementById("PV_LResidencia_MR_N_Val").value;
    document.getElementById("valor_LResidencia_MR_N").value =  Number.parseFloat(Fila3).toFixed(2);

    UbiGeoSuma= Fila1 + Fila2 + Fila3;
    document.getElementById("pesoFinal_AG_MR_N").value = Number.parseFloat(UbiGeoSuma).toFixed(2);
    
    UbiGeoValFinal= document.getElementById("pesoFinal_AG_MR_N").value * document.getElementById("ubicacionG_MR_N_Val").value;
    document.getElementById("valorFinal_AG_MR_N").value = Number.parseFloat(UbiGeoValFinal).toFixed(2);


    //START ACTIVIDAD ECONOMICA
    Fila4 = document.getElementById("calificacion_Categoria_MR_N").value * document.getElementById("PV_Categoria_MR_N_Val").value;
    document.getElementById("valor_Categoria_MR_N").value =  Number.parseFloat(Fila4).toFixed(2);

    Fila5 = document.getElementById("calificacion_Profesion_MR_N").value * document.getElementById("PV_Profesion_MR_N_Val").value;
    document.getElementById("valor_Profesion_MR_N").value =  Number.parseFloat(Fila5).toFixed(2);

    Fila6 = document.getElementById("calificacion_Empleo_MR_N").value * document.getElementById("PV_Empleo_MR_N_Val").value;
    document.getElementById("valor_Empleo_MR_N").value =  Number.parseFloat(Fila6).toFixed(2);

    Fila7 = document.getElementById("calificacion_LActividadEconomica_MR_N").value * document.getElementById("PV_LActividadEconomica_MR_N_Val").value;
    document.getElementById("valor_LActividadEconomica_MR_N").value =  Number.parseFloat(Fila7).toFixed(2);

    Fila8 = document.getElementById("calificacion_ResultadosBusquedas_MR_N").value * document.getElementById("PV_ResultadosBusquedas_MR_N_Val").value;
    document.getElementById("valor_ResultadosBusquedas_MR_N").value =  Number.parseFloat(Fila8).toFixed(2);

    Fila9 = document.getElementById("calificacion_CondicionPep_MR_N").value * document.getElementById("PV_CondicionPep_MR_N_Val").value;
    document.getElementById("valor_CondicionPep_MR_N").value =  Number.parseFloat(Fila9).toFixed(2);

    ActEcoSuma= Fila4  + Fila5 + Fila6 + Fila7 + Fila8 + Fila9;
    document.getElementById("pesoFinal_AC_MR_N").value = Number.parseFloat(ActEcoSuma).toFixed(2);
    
    ActEcoValFinal= document.getElementById("pesoFinal_AC_MR_N").value * document.getElementById("ACGeneral_MR_N_Val").value;
    document.getElementById("valorFinal_AC_MR_N").value = Number.parseFloat(ActEcoValFinal).toFixed(2);

    //START PRODUCTO
    Fila10 = document.getElementById("calificacion_ProductoSolicitado_MR_N").value * document.getElementById("PV_ProductoSolicitado_MR_N_Val").value;
    document.getElementById("valor_ProductoSolicitado_MR_N").value =  Number.parseFloat(Fila10).toFixed(2);

    Fila11 = document.getElementById("calificacion_Monto_MR_N").value * document.getElementById("PV_Monto_MR_N_Val").value;
    document.getElementById("valor_Monto_MR_N").value =  Number.parseFloat(Fila11).toFixed(2);

    ProductoSuma= Fila10  + Fila11 ;
    document.getElementById("pesoFinal_Monto_MR_N").value = Number.parseFloat(ProductoSuma).toFixed(2);
    
    ProductoValFinal= document.getElementById("pesoFinal_Monto_MR_N").value * document.getElementById("productoGeneral_MR_N_Val").value;
    document.getElementById("valorFinal_Monto_MR_N").value = Number.parseFloat(ProductoValFinal).toFixed(2);

    //START CANAL DE PAGO

    Fila12 = document.getElementById("calificacion_FormaPago_MR_N").value * document.getElementById("PV_FormaPago_MR_N_Val").value;
    document.getElementById("valor_FormaPago_MR_N").value =  Number.parseFloat(Fila12).toFixed(2);

    Fila13 = document.getElementById("calificacion_OrigenesRecursos_MR_N").value * document.getElementById("PV_OrigenesRecursos_MR_N_Val").value;
    document.getElementById("valor_OrigenesRecursos_MR_N").value =  Number.parseFloat(Fila13).toFixed(2);

    CpagoSuma= Fila12  + Fila13 ;
    document.getElementById("pesoFinal_OrigenesRecursos_MR_N").value = Number.parseFloat(CpagoSuma).toFixed(2);
    
    CpagoValFinal= document.getElementById("pesoFinal_OrigenesRecursos_MR_N").value * document.getElementById("canalPago_MR_N_Val").value;
    document.getElementById("valorFinal_OrigenesRecursos_MR_N").value = Number.parseFloat(CpagoValFinal).toFixed(2);

    //TRATABAJANDO EN EL RIESGO FINAL
    var RiesgoFinal;
    RiesgoFinal = UbiGeoValFinal + ActEcoValFinal + ProductoValFinal + CpagoValFinal ;
    m = document.getElementById("puntuacionFinal_MR_N").value = Number.parseFloat(RiesgoFinal).toFixed(2);
    //alert (m);

    if (RiesgoFinal>= 0.01 && RiesgoFinal<=1.99 ){
        document.getElementById("riesgo").style.backgroundColor = "#00b050";
        s= document.getElementById('etiqueta').innerHTML = 'Bajo';
        document.getElementById("riesgoCliente").value = s;
        //alert(m);

    }else if (RiesgoFinal>= 2  && RiesgoFinal<=2.99) {
        document.getElementById("riesgo").style.backgroundColor = "#ffff00";
        s= document.getElementById('etiqueta').innerHTML = 'Medio';
        document.getElementById("riesgoCliente").value = s;
        //alert(m);

    } else if(RiesgoFinal>=3){
        document.getElementById("riesgo").style.backgroundColor = "#ff0000";
        s= document.getElementById('etiqueta').innerHTML = 'Alto';
        document.getElementById("riesgoCliente").value = s;
    

    }
    else{
        document.getElementById("riesgo").style.backgroundColor = "#808080";
        
    }

    //ESTABLECER PARAMETROS DE TIPO TEXTO PARA LA MATRIZ DE INFORME GENERAL
    b = document.getElementById("razonSocial_MR_N");
    cliente = b.options[b.selectedIndex].text;
    document.getElementById("cliente").value = cliente;
    
    a = document.getElementById("razonSocial_MR_N");
    idcliente = a.options[a.selectedIndex].value;
    document.getElementById("idCliente").value = idcliente;
    
    c = document.getElementById("sbVariable_LNacimiento_MR_N");
    lugarNacimiento = c.options[c.selectedIndex].text;
    document.getElementById("lugarNacimiento").value = lugarNacimiento;

    d = document.getElementById("sbVariable_Nacionalidad_MR_N");
    lugarNacionalidad = d.options[d.selectedIndex].text;
    document.getElementById("lugarNacionalidad").value = lugarNacionalidad;
    
    e = document.getElementById("sbVariable_LResidencia_MR_N");
    lugarResidencia = e.options[e.selectedIndex].text;
    document.getElementById("lugarResidencia").value = lugarResidencia;

    f = document.getElementById("sbVariable_Categoria_MR_N");
    categoria = f.options[f.selectedIndex].text;
    document.getElementById("categoria").value = categoria;

    g = document.getElementById("sbVariable_Profesion_MR_N");
    profesion = g.options[g.selectedIndex].text;
    document.getElementById("profesion").value = profesion;

    h = document.getElementById("sbVariable_Empleo_MR_N");
    actividadEmpleo = h.options[h.selectedIndex].text;
    document.getElementById("actividadEmpleo").value = actividadEmpleo;

    i = document.getElementById("sbVariable_LActividadEconomica_MR_N");
    lugarActividadEconomica = i.options[i.selectedIndex].text;
    document.getElementById("lugarActividadEconomica").value = lugarActividadEconomica;

    j = document.getElementById("sbVariable_ResultadosBusquedas_MR_N");
    resultadosBusquedas = j.options[j.selectedIndex].text;
    document.getElementById("resultadosBusquedas").value = resultadosBusquedas;

    k = document.getElementById("sbVariable_CondicionPep_MR_N");
    condicionPEP = k.options[k.selectedIndex].text;
    document.getElementById("condicionPEP").value = condicionPEP;

    l = document.getElementById("sbVariable_ProductoSolicitado_MR_N");
    productoSolicitado = l.options[l.selectedIndex].text;
    document.getElementById("productoSolicitado").value = productoSolicitado;

    o = document.getElementById("sbVariable_Monto_MR_N");
    monto = o.options[o.selectedIndex].text;
    document.getElementById("monto").value = monto;

    p = document.getElementById("sbVariable_FormaPago_MR_N");
    formaPago = p.options[p.selectedIndex].text;
    document.getElementById("formaPago").value = formaPago;

    q = document.getElementById("sbVariable_OrigenesRecursos_MR_N");
    origenRecursos = q.options[q.selectedIndex].text;
    document.getElementById("origenRecursos").value = origenRecursos;

    r = document.getElementById("sbVariable_OrigenesRecursos_MR_N");
    origenRecursos = r.options[r.selectedIndex].text;
    document.getElementById("origenRecursos").value = origenRecursos;


       alert ("ERROR CODE 404 NOT FOUND RIESGO");
   
        riesgo = document.getElementById("riesgoCliente").value;
        alert (riesgo);
          
          inicio=document.getElementById("fecha_MR_N").value;
       alert (inicio);
          if (riesgo == "Bajo"){
              start = new Date(inicio);
              start.setFullYear(start.getFullYear() + 5);          
              startf = start.toISOString().slice(0,10).replace("/-/","/");
              document.getElementById("fechaProxRevision_ME").value= startf;
          }

          if (riesgo == "Medio"){
              inicio=document.getElementById("fecha_MR_N").value;
              start = new Date(inicio);
              start.setFullYear(start.getFullYear() + 2);          
              startf = start.toISOString().slice(0,10).replace("/-/","/");
              document.getElementById("fechaProxRevision_ME").value= startf;
          }

          if (riesgo == "Alto"){
              inicio=document.getElementById("fecha_MR_N").value;
              start = new Date(inicio);
              start.setFullYear(start.getFullYear() + 1);          
              startf = start.toISOString().slice(0,10).replace("/-/","/");
              document.getElementById("fechaProxRevision_ME").value= startf;
          }       
}