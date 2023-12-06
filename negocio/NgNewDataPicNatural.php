<?php

include_once("../Entidades/Natural/DatosClienteNaturalPic.php");
include_once("../Entidades/Natural/DatosLaborales.php");
include_once("../Entidades/Natural/DatosConyuge.php");
include_once("../Entidades/Natural/Fiador.php");

include_once("../Entidades/Compartidas/Pep.php");
include_once("../Entidades/Compartidas/Facta.php");
include_once("../Entidades/Compartidas/OrigenesFondos.php");
include_once("../Entidades/Compartidas/Referencias.php");

include_once("../Entidades/Anexos/InteresInfoPN.php");

include_once("../Datos/DtNewDataPicNatural.php");
include_once("../Datos/DtDataPicCompartidos.php");
include_once("../Datos/DtCombos.php");
include_once("../Datos/DtPic.php");

$pn = new DatosClienteNaturalPic();
$dl = new DatosLaborales();
$dc = new DatosConyuge();
$fi = new Fiador();
$ofpj = new OrigenesFondos();
$re = new Referencias();
$info = new InteresInfoPN();

$pep = new Pep();
$facta = new Facta();

$dtMon = new DtNewDataPicNatural();
$dtCom = new DtDataPicCompartidos();

$vacioPais = 141;
$vaciotexto = "N/A";
$valor = 0;
$origenes = 7;
$formapago = 6;
$depa = 67;
$relacion = 5;
$causa = 4;

if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    
    
    switch ($varAccion) 
    {
        case '1':
            try 
            {
                //DatosEntidad--datosInputs -->DATOS GENERALES
              
                //INSERTANDO DATOS GENERALES DEL PIC
                if(empty($_POST['fNacimiento_PN'])){
                    $pn->__SET('fechaNacimiento',NUll);
                }else{
                    $pn->__SET('fechaNacimiento', $_POST['fNacimiento_PN']);
                }

                if(empty($_POST['paisNacimiento_PN'])){
                    $pn->__SET('paisNacimiento',$vacioPais);
                }else{
                    $pn->__SET('paisNacimiento', $_POST['paisNacimiento_PN']);
                }
                if(empty($_POST['depto_paisNacimiento_PN'])){
                    $pn->__SET('deptoPaisNacimiento',$depa);
                }else{
                    $pn->__SET('deptoPaisNacimiento', $_POST['depto_paisNacimiento_PN']);
                }

                if(empty($_POST['nacionalidad_PN'])){
                    $pn->__SET('nacionalidad',$vacioPais);
                }else{
                    $pn->__SET('nacionalidad', $_POST['nacionalidad_PN']);
                }

                if(empty($_POST['depto_nacionalidad_PN'])){
                    $pn->__SET('deptoNacionalidad',$depa);
                }else{
                    $pn->__SET('deptoNacionalidad', $_POST['depto_nacionalidad_PN']);
                }

                if(empty($_POST['estadoCivil_PN'])){
                    $pn->__SET('idEstadoCivil', $relacion);
                }else{
                    $pn->__SET('idEstadoCivil', $_POST['estadoCivil_PN']);
                }
                 
                if(empty($_POST['sexo_PN'])){
                    $pn->__SET('sexo', NULL);
                }else{
                    $pn->__SET('sexo', $_POST['sexo_PN']);
                }
                
                if(empty($_POST['nDependientes_PN'])){
                    $pn->__SET('ndependientes', NULL);
                }else{
                    $pn->__SET('ndependientes', $_POST['nDependientes_PN']);
                }
                
                if(empty($_POST['tipoId_PN'])){
                    $pn->__SET('tipoIdentificacion', NULL);
                }else{
                    $pn->__SET('tipoIdentificacion', $_POST['tipoId_PN']);
                }
                
                if(empty($_POST['numeroId_PN'])){
                    $pn->__SET('numIdentificacion', NULL);
                }else{
                    $pn->__SET('numIdentificacion', $_POST['numeroId_PN']);
                }
                
                if(empty($_POST['paisEmisionId_PN'])){
                    $pn->__SET('paisEmision',$vacioPais);
                }else{
                    $pn->__SET('paisEmision', $_POST['paisEmisionId_PN']);
                }

                if(empty($_POST['fEmisionId_PN'])){
                    $pn->__SET('fechaEmision',NUll);
                }else{
                    $pn->__SET('fechaEmision', $_POST['fEmisionId_PN']);
                }

                if(empty($_POST['fVencimientoId_PN'])){
                    $pn->__SET('fechaVencimiento',NUll);
                }else{
                    $pn->__SET('fechaVencimiento', $_POST['fVencimientoId_PN']);
                }

                if(empty($_POST['direccionDomi_PN'])){
                    $pn->__SET('direccionDomicilio',$vaciotexto);
                }else{
                     $pn->__SET('direccionDomicilio', $_POST['direccionDomi_PN']);
                }
               
                if(empty($_POST['paisDominicilio_AE'])){
                    $pn->__SET('PaisDomicilio',$vacioPais);
                }else{
                    $pn->__SET('PaisDomicilio', $_POST['paisDominicilio_AE']);
                }
                
                if(empty($_POST['departamento'])){
                    $pn->__SET('deptoPaisDomicilio',$depa);
                }else{
                    $pn->__SET('deptoPaisDomicilio', $_POST['departamento']);
                }
                
                if(empty($_POST['telefono_PN'])){
                    $pn->__SET('telefono',null);
                }else{
                    $pn->__SET('telefono', $_POST['telefono_PN']);
                }

                if(empty($_POST['celular_PN'])){
                    $pn->__SET('celular',null);
                }else{
                    $pn->__SET('celular', $_POST['celular_PN']);
                }
                
                if(empty($_POST['correo_PN'])){
                    $pn->__SET('correoPersonaNatural',$vaciotexto);
                }else{
                    $pn->__SET('correoPersonaNatural', $_POST['correo_PN']);
                }
                
                if(empty($_POST['profesion_PN'])){
                    $pn->__SET('profesion',$vaciotexto);
                }else{
                    $pn->__SET('profesion', $_POST['profesion_PN']);
                }
               
                $pn->__SET('idPic', $_POST['idCli_PN']);

                $dtMon->registrarDataPicNatural($pn);
                               
             
                
                //INSERTANDO DATOS LABORALES

                if(empty($_POST['empresa_DL'])){
                    $dl->__SET('nombreEmpresa', $vaciotexto);
                }else{
                    $dl->__SET('nombreEmpresa',$_POST['empresa_DL']);
                }

                if(empty($_POST['Cargo_DL'])){
                    $dl->__SET('cargoEmpresa',$vaciotexto);
                }else{
                    $dl->__SET('cargoEmpresa', $_POST['Cargo_DL']);
                }
                
                if(empty($_POST['fIngreso_DL'])){
                    $dl->__SET('fechaIngreso',NUll);
                }else{
                    $dl->__SET('fechaIngreso', $_POST['fIngreso_DL']);
                }

                if(empty($_POST['antiguedad_DL'])){
                    $dl->__SET('antiguedad',NUll);
                }else{
                    $dl->__SET('antiguedad', $_POST['antiguedad_DL']);
                }
                
                if(empty($_POST['direcEmpresa_DL'])){
                    $dl->__SET('direccionEmpresa',$vaciotexto);
                }else{
                    $dl->__SET('direccionEmpresa', $_POST['direcEmpresa_DL']);
                }
               
                if(empty($_POST['paisEmpresa_DL'])){
                    $dl->__SET('paisEmpresa',$vacioPais);
                }else{
                    $dl->__SET('paisEmpresa', $_POST['paisEmpresa_DL']);
                }

                if(empty($_POST['telEmpresa_DL'])){
                    $dl->__SET('telefono',NUll);
                }else{
                    $dl->__SET('telefono', $_POST['telEmpresa_DL']);
                }

                if(empty($_POST['salario_DL'])){
                    $dl->__SET('salarioMensual',NUll);
                }else{
                    $dl->__SET('salarioMensual', $_POST['salario_DL']);
                }

                if(empty($_POST['otrosIngresos_DL'])){
                    $dl->__SET('otrosIngresos',NUll);
                }else{
                    $dl->__SET('otrosIngresos', $_POST['otrosIngresos_DL']);
                }
                
                if(empty($_POST['Egresos_DL'])){
                    $dl->__SET('egresosMensuales',NUll);
                }else{
                    $dl->__SET('egresosMensuales', $_POST['Egresos_DL']);
                }

                if(empty($_POST['IndicarOI_DL'])){
                    $dl->__SET('fuenteOtrosIngresos',$vaciotexto);
                }else{
                    $dl->__SET('fuenteOtrosIngresos', $_POST['IndicarOI_DL']);
                }
                
                $dl->__SET('idPic', $_POST['idCli_PN']);
                $dtMon->registrarDatosLaborales($dl);
                
                //INSERTANDO DATOS DEL CONYUGE
                if(empty($_POST['Nombre_CO'])){
                    $dc->__SET('nombreConyugue',$vaciotexto);
                }else{
                    $dc->__SET('nombreConyugue', $_POST['Nombre_CO']);
                }
               
                
                if(empty($_POST['nacimiento_CO'])){
                    $dc->__SET('fechaNacimiento',NUll);
                }else{
                    $dc->__SET('fechaNacimiento', $_POST['nacimiento_CO']);
                }

                if(empty($_POST['paisNacimiento_CO'])){
                    $dc->__SET('paisNacimientoConyuge',$vacioPais);
                    
                }else{
                    $dc->__SET('paisNacimientoConyuge', $_POST['paisNacimiento_CO']);
                }

                if(empty($_POST['nacionalidad_CO'])){
                    $dc->__SET('nacionalidadConyuge',$vacioPais);
                }else{
                    $dc->__SET('nacionalidadConyuge', $_POST['nacionalidad_CO']);
                }

                if(empty($_POST['tipoId_CO'])){
                    $dc->__SET('tipoIdentificacion', NULL);
                }else{
                    $dc->__SET('tipoIdentificacion', $_POST['tipoId_CO']);
                }

                if(empty($_POST['tipoId_CO'])){
                    $dc->__SET('numeroIdentificacion', NULL);
                }else{
                    $dc->__SET('numeroIdentificacion', $_POST['numId_CO']);
                }
                
                if(empty($_POST['paisEmisionId_CO'])){
                    $dc->__SET('paisEmision',$vacioPais);
                }else{
                    $dc->__SET('paisEmision', $_POST['paisEmisionId_CO']);
                }

                if(empty($_POST['profesion_CO'])){
                    $dc->__SET('profesion', NULL);
                }else{
                    $dc->__SET('profesion', $_POST['profesion_CO']);
                }
                
                if(empty($_POST['celular_CO'])){
                    $dc->__SET('celular', NULL);
                }else{
                    $dc->__SET('celular', $_POST['celular_CO']);
                }
                
                if(empty($_POST['empresaTrab_CO'])){
                    $dc->__SET('empresaLabora', $vaciotexto);
                }else{
                    $dc->__SET('empresaLabora', $_POST['empresaTrab_CO']);
                }

                if(empty($_POST['telefonoEmpresa_CO'])){
                    $dc->__SET('telefono', NULL);
                }else{
                    $dc->__SET('telefono', $_POST['telefonoEmpresa_CO']);
                }
                
                if(empty($_POST['cargo_CO'])){
                    $dc->__SET('cargoEmpresa', $vaciotexto);
                }else{
                    $dc->__SET('cargoEmpresa', $_POST['cargo_CO']);
                }
                
                if(empty($_POST['ingreMensual_CO'])){
                   $dc->__SET('ingresoMensual', NULL);
                }else{
                    $dc->__SET('ingresoMensual', $_POST['ingreMensual_CO']);
                }
                $dc->__SET('idPic', $_POST['idCli_PN']);
                $dtMon->registrarDatosConyuge($dc);
                 
                 //INSERTANDO DATOS DEL FIADOR
                
                if(empty($_POST['nombre_F'])){
                    $fi->__SET('nombreFiador',$vaciotexto);
                }else{
                    $fi->__SET('nombreFiador', $_POST['nombre_F']);
                }

                if(empty($_POST['relacionDeudor_F'])){
                    $fi->__SET('RelacionDeudor',NULL);
                }else{
                    $fi->__SET('RelacionDeudor', $_POST['relacionDeudor_F']);
                }

                if(empty($_POST['nacionalidad_F'])){
                    $fi->__SET('nacionalidad',$vacioPais);
                }else{
                    $fi->__SET('nacionalidad', $_POST['nacionalidad_F']);
                }
                
                if(empty($_POST['TipoId_F'])){
                    $fi->__SET('tipoIdentificacionFiador', NULL);
                }else{
                    $fi->__SET('tipoIdentificacionFiador', $_POST['TipoId_F']);
                }

                if(empty($_POST['numId_F'])){
                    $fi->__SET('numIdFiador', NULL);
                }else{
                    $fi->__SET('numIdFiador', $_POST['numId_F']);

                }
                
                if(empty($_POST['PaisEmisionId_F'])){
                    $fi->__SET('paisEmision',$vacioPais);
                }else{
                    $fi->__SET('paisEmision', $_POST['PaisEmisionId_F']);
                }

                if(empty($_POST['correo_F'])){
                    $fi->__SET('correoFiador',$vaciotexto);
                }else{
                    $fi->__SET('correoFiador', $_POST['correo_F']);
                }

                if(empty($_POST['celular_F'])){
                    $fi->__SET('celularFiador', NULL);
                }else{
                    $fi->__SET('celularFiador', $_POST['celular_F']);
                }
                
                if(empty($_POST['direcDomicilio_F'])){
                    $fi->__SET('direccionFiador',$vaciotexto);
                }else{
                    $fi->__SET('direccionFiador', $_POST['direcDomicilio_F']);

                }
                
                if(empty($_POST['paisDomicilio_F'])){
                    $fi->__SET('paisDomicilioFiador',$vacioPais);
                }else{
                    $fi->__SET('paisDomicilioFiador', $_POST['paisDomicilio_F']);
                }  
                   
                if(empty($_POST['telefono_F'])){
                    $fi->__SET('telefonoFiador', NULL);
                }else{
                    $fi->__SET('telefonoFiador', $_POST['telefono_F']);
                }

                if(empty($_POST['empresa_F'])){
                    $fi->__SET('EmpresaFiador',$vaciotexto);
                }else{
                    $fi->__SET('EmpresaFiador', $_POST['empresa_F']);
                }  
                
                if(empty($_POST['telefonoEmpresa_F'])){
                    $fi->__SET('telefonoEmpresa',NULL);
                }else{
                    $fi->__SET('telefonoEmpresa', $_POST['telefonoEmpresa_F']);
                }  
                
                if(empty($_POST['cargo_F'])){
                    $fi->__SET('cargoFiador',$vaciotexto);
                }else{
                    $fi->__SET('cargoFiador', $_POST['cargo_F']);
                } 
                                
                if(empty($_POST['Ingresos_F'])){
                    $fi->__SET('ingresoMensualFiador',NULL);
                }else{
                    $fi->__SET('ingresoMensualFiador', $_POST['Ingresos_F']);
                }  
                $fi->__SET('idPic', $_POST['idCli_PN']);
                $dtMon->registrarFiador($fi);
              
                
                //INSERTANDO DATOS ORIGENES DE LOS FONDOS

                $ofpj->__SET('idPic', $_POST['idCli_PN']);
                if(empty($_POST['formaPago_PN']))
                { 
                    $ofpj->__SET('idFormaPago', $formapago);
                }
                else{
                    $ofpj->__SET('idFormaPago', $_POST['formaPago_PN']);
                }

                if(empty($_POST['origenesRecursos_PN']))
                {
                    $ofpj->__SET('idFuenteFondos', $origenes);
                }
                else{
                    $ofpj->__SET('idFuenteFondos', $_POST['origenesRecursos_PN']);
                }
                $dtCom->registrarOrigenesFondos($ofpj);
                 
                //INSERTANDO DATOS DE REFERENCIAS  

                  $re->__SET('nombreReferencia', $_POST['nombre_R1']);
                  $re->__SET('tipoIdentificacion', $_POST['tipoId_R1']);
                  $re->__SET('numeroIdentificacion', $_POST['numId_R1']);
                  $re->__SET('tiempoReferido', $_POST['tiempoReferido_R1']);
                  $re->__SET('celular', $_POST['celular_R1']);
                  $re->__SET('telefono', $_POST['telefono_R1']);
                  $re->__SET('LugarLabora', $_POST['lTrabaja_R1']);
                  $re->__SET('idPic', $_POST['idCli_PN']);
                  $dtMon->registrarReferencias($re);

                  $re->__SET('nombreReferencia', $_POST['nombre_R2']);
                  $re->__SET('tipoIdentificacion', $_POST['tipoId_R2']);
                  $re->__SET('numeroIdentificacion', $_POST['numId_R2']);
                  $re->__SET('tiempoReferido', $_POST['tiempoReferido_R2']);
                  $re->__SET('celular', $_POST['celular_R2']);
                  $re->__SET('telefono', $_POST['telefono_R2']);
                  $re->__SET('LugarLabora', $_POST['lTrabaja_R2']);
                  $re->__SET('idPic', $_POST['idCli_PN']);
                  $dtMon->registrarReferencias($re);
                  
                //INSERTANDO DATOS PEP

                $pepc = $_POST['pep'];
                if ($pepc=='Si'){
                    $pep->__SET('pep',$_POST['pep']);
                    $pep->__SET('nombrePep', $_POST['nombre_pep']);
                    if(empty($_POST['relacion_pep'])){
                        $pep->__SET('idRelacionCliente',$relacion);
                    }else{
                        $pep->__SET('idRelacionCliente', $_POST['relacion_pep']);
                    } 
                    $pep->__SET('nombreEntidad', $_POST['nombreEntidad_pep']);
                    if(empty($_POST['pais_PEP'])){
                        $pep->__SET('PaisPep',$relacion);
                    }else{
                        $pep->__SET('PaisPep', $_POST['pais_PEP']);
                    } 
                    $pep->__SET('cargo', $_POST['cargo_pep']);
                    $pep->__SET('perido', $_POST['periodo_pep']);
                    $pep->__SET('idPic', $_POST['idCli_PN']);
                    $pep->__SET('riesgoPep', 3);
                    $dtCom->registrarFullPep($pep);      
                }
                else{
                    $pep->__SET('pep', 'No');
                    $pep->__SET('nombrePep', $vaciotexto);
                    $pep->__SET('idRelacionCliente', $relacion);
                    $pep->__SET('nombreEntidad',$vaciotexto);
                    $pep->__SET('PaisPep', $vacioPais);
                    $pep->__SET('cargo', $vaciotexto);
                    $pep->__SET('perido',$vaciotexto);
                    $pep->__SET('riesgoPep', 1);
                    $pep->__SET('idPic', $_POST['idCli_PN']);
                    
                    $dtCom->registrarFullPep($pep);
                }
               

                //INSERTANDO DATOS FACTA

                $factac = $_POST['facta'];
                if ($factac=='Si'){
                    $facta->__SET('Facta', $_POST['facta']);
                    $facta->__SET('nombreFacta', $_POST['nombre_facta']);
                    if(empty($_POST['relacionCliente_facta'])){
                        $facta->__SET('idRelacionCliente',$relacion);
                    }else{
                        $facta->__SET('idRelacionCliente', $_POST['relacionCliente_facta']);
                    } 
                    if(empty($_POST['causa_facta'])){
                        $facta->__SET('idCausa',$causa);
                    }else{
                        $facta->__SET('idCausa', $_POST['causa_facta']);
                    }
                   
                    $facta->__SET('idPic', $_POST['idCli_PN']);
                    $dtCom->registrarFullFacta($facta);       
                }
                else{
                    $facta->__SET('Facta', 'No');
                    $facta->__SET('nombreFacta', $vaciotexto);
                    $facta->__SET('idRelacionCliente', $relacion);
                    $facta->__SET('idCausa', $causa);
                    $facta->__SET('idPic', $_POST['idCli_PN']);
                    $dtCom->registrarFullFacta($facta);
                }
               

                /* INSERTANDO LOS DATOS DE LA TABLA DE INTERES */
                if(empty($_POST['cat_ocupacional_PN'])){
                    $info->__SET('idCategoriaOcupacional',NUll);
                }else{
                    $info->__SET('idCategoriaOcupacional', $_POST['cat_ocupacional_PN']);
                }

                if(empty($_POST['sbVariable_Profesion_MR_N'])){
                    $info->__SET('idCatalogoOCGO',NUll);
                }else{
                    $info->__SET('idCatalogoOCGO', $_POST['sbVariable_Profesion_MR_N']);
                }

                if(empty($_POST['sbVariable_Empleo_MR_N'])){
                    $info->__SET('idCatalogo_Acti_Economica',NUll);
                }else{
                    $info->__SET('idCatalogo_Acti_Economica', $_POST['sbVariable_Empleo_MR_N']);
                }

                if(empty($_POST['interes_LAE'])){
                    $info->__SET('idPaisACII',NUll);
                }else{
                    $info->__SET('idPaisACII', $_POST['interes_LAE']);
                }

                if(empty($_POST['interes_depto_LAE'])){
                    $info->__SET('idDeptoACII',NUll);
                }else{
                    $info->__SET('idDeptoACII', $_POST['interes_depto_LAE']);
                }

                if(empty($_POST['resultBusqueda_II'])){
                    $info->__SET('idBusquedaRes',NUll);
                }else{
                    $info->__SET('idBusquedaRes', $_POST['resultBusqueda_II']);
                }
                $info->__SET('idPic', $_POST['idCli_PN']);
                
                $dtMon->registrarInfoInteresPN($info);
                
                header("Location: ../dist/ListaClientes.php?msjNewEmp=1");
				
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/ListaClientes.php?msjNewEmp=2");
                die($e->getMessage());
            }

        
            break;
        
        case '2':
            
            break;
        default:
            # code...
            break;
    }

}
