<?php

include_once("../Entidades/Juridio/DatosClienteJuridicoPic.php");
include_once("../Entidades/Juridio/DatosRepresentanteLegal.php");
include_once("../Entidades/Juridio/Accionistas.php");
include_once("../Entidades/Juridio/BeneficiariosFinales.php");
include_once("../Entidades/Juridio/ActividadEconomica.php");
include_once("../Entidades/Juridio/PrincipalesClientes.php");
include_once("../Entidades/Juridio/PrincipalesProveedores.php");

include_once("../Entidades/Compartidas/Pep.php");
include_once("../Entidades/Compartidas/Facta.php");
include_once("../Entidades/Compartidas/OrigenesFondos.php");

include_once("../Entidades/Anexos/BusquedaRes.php");
include_once("../Entidades/Anexos/Constitucion.php");
include_once("../Entidades/Anexos/InteresInfo.php");
include_once("../Entidades/Anexos/TipoPerJuridica.php");

include_once("../Datos/DtEditDataPicJuridico.php");
include_once("../Datos/DtDataPicCompartidos.php");
include_once("../Datos/DtCombos.php");
include_once("../Datos/DtPic.php");

$pj = new DatosClienteJuridicoPic();
$rl = new DatosRepresentanteLegal();
$ac = new Accionistas();
$bf = new BeneficiariosFinales();
$ofpj = new OrigenesFondos();
$ae = new ActividadEconomica();
$pc = new PrincipalesClientes();
$pp = new PrincipalesProveedores();
$pep = new Pep();
$facta = new Facta();
$info  =new InteresInfo();

$dtMon = new DtEditDataPicJuridico();
$dtCom = new DtDataPicCompartidos();

$vacioPais= 164;
$vaciotexto ="N/A";
$valor = 0;
$origenes = 10;
$formapago = 6;
$ag = 6;
$actividadNegocio = 6;
$depa = 67;
$relacion = 5;
$causa = 4;
$nulo = NULL;
if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                
                
                // --> EDITANDO DATOS GENERALES
               
                
                if(empty($_POST['paisContitucion_PJ'])){
                    $pj->__SET('paisConstitucion',$vacioPais);
                }else{
                    $pj->__SET('paisConstitucion', $_POST['paisContitucion_PJ']);
                }

                if(empty($_POST['fechaConstitucion_PJ'])){
                    $pj->__SET('fechaConstitucion',$nulo);
                }else{
                    $pj->__SET('fechaConstitucion', $_POST['fechaConstitucion_PJ']);
                }

                if(empty($_POST['fechaInscripcion_PJ'])){
                    $pj->__SET('fechaInscripcion',$nulo);
                }else{
                    $pj->__SET('fechaInscripcion', $_POST['fechaInscripcion_PJ']);
                }
                
                if(empty($_POST['correoPersonaContacto_PJ'])){
                    $pj->__SET('correoPersonaContacto',$vaciotexto);
                }else{
                    $pj->__SET('correoPersonaContacto', $_POST['correoPersonaContacto_PJ']);
                }
                
                if(empty($_POST['nombrePersonaContacto_PJ'])){
                    $pj->__SET('nombrePersonaContacto',$vaciotexto);
                }else{
                    $pj->__SET('nombrePersonaContacto', $_POST['nombrePersonaContacto_PJ']);
                }
               
                if(empty($_POST['cargoPersonaContacto_PJ'])){
                    $pj->__SET('cargoPersonaContacto',$vaciotexto);
                }else{
                    $pj->__SET('cargoPersonaContacto', $_POST['cargoPersonaContacto_PJ']);
                } 
                
                if(empty($_POST['telefonoPersonaContacto_PJ'])){
                    $pj->__SET('telefono',$nulo);
                }else{
                    $pj->__SET('telefono', $_POST['telefonoPersonaContacto_PJ']);
                } 

                $pj->__SET('idPic', $_POST['idCli_PN']);
                $dtMon->editarDataPicJuridico($pj);
              
                
                // iNSERTANDO DATOS DE REPRESENTANTE LEGAL
                if(empty($_POST['nombreCompleto_RL'])){
                    $rl->__SET('nombreRepresentanteLegal',$vaciotexto);
                }else{
                    $rl->__SET('nombreRepresentanteLegal', $_POST['nombreCompleto_RL']);
                }
                
                if(empty($_POST['paisNacimiento_RL'])){
                    $rl->__SET('paisNacimiento',$vacioPais);
                }else{
                    $rl->__SET('paisNacimiento', $_POST['paisNacimiento_RL']);
                }

                if(empty($_POST['nacionalidad_RL'])){
                    $rl->__SET('nacionalidad',$vacioPais);
                }else{
                    $rl->__SET('nacionalidad', $_POST['nacionalidad_RL']);
                }

                if(empty($_POST['tipoId_RL'])){
                    $rl->__SET('tipoIdentificacion',$nulo);
                }else{
                    $rl->__SET('tipoIdentificacion', $_POST['tipoId_RL']);
                }
                
                if(empty($_POST['numeroId_RL'])){
                    $rl->__SET('numeroIdentificacion',$nulo);
                }else{
                    $rl->__SET('numeroIdentificacion', $_POST['numeroId_RL']);
                }
                
                if(empty($_POST['paisEmisionId_RL'])){
                    $rl->__SET('paisEmision',$vacioPais);
                }else{
                    $rl->__SET('paisEmision', $_POST['paisEmisionId_RL']);
                }

                if(empty($_POST['fechaEmisionId_RL'])){
                    $rl->__SET('fechaEmision',$nulo);
                }else{
                    $rl->__SET('fechaEmision', $_POST['fechaEmisionId_RL']);
                }
                
                if(empty($_POST['fechaVencimientoId_RL'])){
                    $rl->__SET('fechaVencimiento',$nulo);
                }else{
                    $rl->__SET('fechaVencimiento', $_POST['fechaVencimientoId_RL']);
                }
                
                if(empty($_POST['paisResidencia_RL'])){
                    $rl->__SET('paisResidencia',$vacioPais);
                }else{
                    $rl->__SET('paisResidencia', $_POST['paisResidencia_RL']);
                }
                
                if(empty($_POST['celular_RL'])){
                    $rl->__SET('celular',$nulo);
                }else{
                    $rl->__SET('celular', $_POST['celular_RL']);
                }
               
				if(empty($_POST['correo_RL'])){
                    $rl->__SET('correo',$vaciotexto);
                }else{
                    $rl->__SET('correo', $_POST['correo_RL']);
                }

                if(empty($_POST['cargo_RL'])){
                    $rl->__SET('cargo',$vaciotexto);
                }else{
                    $rl->__SET('cargo', $_POST['cargo_RL']);
                }
                
                if(empty($_POST['profesion_RL'])){
                    $rl->__SET('profesion',$vaciotexto);
                }else{
                    $rl->__SET('profesion', $_POST['profesion_RL']);
                }

                $rl->__SET('idPic', $_POST['idCli_PN']);
                $dtMon->editarDatosRL($rl);

                  
              
          

                
                // iNSERTANDO DATOS DE ACCIONISTAS  
                $nombreAC = $_POST['nombre_AC'];
                $nacionalidadAC = $_POST['nacionalidad_AC'];
                $idAC = $_POST['id_AC'];
                $accionesAC = $_POST['acciones_AC'];

                foreach ($nombreAC as $key => $n){
                    
                    $nombre =$n; 
                    $nacionalidad =$nacionalidadAC[$key]; 
                    $id = $idAC [$key];
                    $acciones = $accionesAC [$key];
                   
                    $ac->__SET('nombreCompletoAccionistas', $nombre);
                    if ( $nacionalidad == NULL){
                        $ac->__SET('nacionalidadAccionistas', 164);
                    }else{
                        $ac->__SET('nacionalidadAccionistas', $nacionalidad);
                    }

                    if ( $id == NULL){
                        $ac->__SET('numIdAccionistas', NULL);
                    }else{
                        $ac->__SET('numIdAccionistas', $id);
                    }

                    if ( $acciones == NULL){
                        $ac->__SET('Acciones', NULL);
                    }else{
                        $ac->__SET('Acciones', $acciones);
                    }
                       
                    $ac->__SET('idAccionistas', $_POST['idAccionistas']);
                    $ac->__SET('idPic', $_POST['idCli_PN']);
                    
                    $dtMon->editarDatosAc($ac);

                    
                }
                  
                
                //INSERTANDO DATOS DE BENEFICIARIOS FINALES

                $nombreBF = $_POST['nombre_BF'];
                $apellidoBF = $_POST['apellido_BF'];
                $nacionalidadBF = $_POST['nacionalidad_BF'];
                $idBF = $_POST['id_BF'];
                $accionesBF = $_POST['acciones_BF'];

                foreach ($nombreBF as $key => $r){
                    
                    $nombre =$r; 
                    $apellido =$apellidoBF[$key]; 
                    $nacionalidad =$nacionalidadBF[$key]; 
                    $id = $idBF [$key];
                    $acciones = $accionesBF [$key];

                    if ( $nombre == NULL){
                        $bf->__SET('nombreBeneFinales', NULL);
                    }else{
                        $bf->__SET('nombreBeneFinales', $nombre);
                    }
                   
                    if ( $apellido == NULL){
                        $bf->__SET('ApellidosBeneFinales', NULL);
                    }else{
                        $bf->__SET('ApellidosBeneFinales', $apellido);
                    }
                                      
                    if ( $nacionalidad == NULL){
                        $bf->__SET('nacionalidadBeneFinales', 164);
                    }else{
                        $bf->__SET('nacionalidadBeneFinales', $nacionalidad);
                    }

                    if ( $id == NULL){
                        $bf->__SET('numIdBeneFinales', NULL);
                    }else{
                        $bf->__SET('numIdBeneFinales', $id);
                    }

                    if ( $acciones == NULL){
                        $bf->__SET('AccionesBeneFinales', NULL);
                    }else{
                        $bf->__SET('AccionesBeneFinales', $acciones);
                    }
                                        
                    $bf->__SET('idBeneficiariosFinales', $_POST['idBeneficiariosFinales']);
                    $bf->__SET('idPic', $_POST['idCli_PN']);
                    $dtMon->editarDatosBf($bf);

                    
                }
            
                //END inserciones multiples a la tabla BENEFICIAROS FINALES
                   
            
             
               
            
                //INSERTANDO DATOS ORIGENES DE LOS FONDOS
                $ofpj->__SET('idPic', $_POST['idCli_PN']);
                if(empty($_POST['formaPago_OFPJ']))
                { 
                    $ofpj->__SET('idFormaPago', $formapago);
                }
                else{
                    $ofpj->__SET('idFormaPago', $_POST['formaPago_OFPJ']);
                    
                }

                if(empty($_POST['origenesFondos_OFPJ']))
                {
                    $ofpj->__SET('idFuenteFondos', $origenes);
                }
                else{
                    $ofpj->__SET('idFuenteFondos', $_POST['origenesFondos_OFPJ']);
                }
                $dtCom->registrarOrigenesFondos($ofpj);
                      
               
                  
                // --> INSERTANDO DATOS DE ACTIVIDAD ECONOMICA
                if(empty($_POST['nombreComercial'])){
                    $ae->__SET('nombreComercial',$vaciotexto);
                }else{
                    $ae->__SET('nombreComercial', $_POST['nombreComercial']);
                }

                if(empty($_POST['idTributaria'])){
                    $ae->__SET('idTributaria',$vaciotexto);
                }else{
                    $ae->__SET('idTributaria', $_POST['idTributaria']);
                }

                if(empty($_POST['aniosNegocio'])){
                    $ae->__SET('anios',$nulo);
                }else{
                    $ae->__SET('anios', $_POST['aniosNegocio']);
                }

                if(empty($_POST['DomicilioComercial'])){
                    $ae->__SET('domicilioComercial',$vaciotexto);
                }else{
                    $ae->__SET('domicilioComercial', $_POST['DomicilioComercial']);
                }
                
                if(empty($_POST['paisDominicilio_AE'])){
                    $ae->__SET('paisDomicilio',$vacioPais);
                }else{
                    $ae->__SET('paisDomicilio', $_POST['paisDominicilio_AE']);
                }
                
                if(empty($_POST['departamento'])){
                    $ae->__SET('departamento',$depa);
                }else{
                    $ae->__SET('departamento', $_POST['departamento']);
                }
                
                if(empty($_POST['paginaWeb'])){
                    $ae->__SET('paginaWeb',$vaciotexto);
                }else{
                    $ae->__SET('paginaWeb', $_POST['paginaWeb']);
                }
                
                if(empty($_POST['telefonoOficina'])){
                    $ae->__SET('telefonoOficina',$nulo);
                }else{
                    $ae->__SET('telefonoOficina', $_POST['telefonoOficina']);
                }

                if(empty($_POST['AreaGeografica'])){
                    $ae->__SET('idAreaGeografica',$ag);
                }
                else{
                    $ae->__SET('idAreaGeografica', $_POST['AreaGeografica']);
                }
                
                if(empty($_POST['ActividadNegocio'])){
                    $ae->__SET('idActividadNegocio',$actividadNegocio);
                }else{
                    $ae->__SET('idActividadNegocio', $_POST['ActividadNegocio']);
                }

                if(empty($_POST['descripcionEmpresa'])){
                    $ae->__SET('descripcion',$vaciotexto);
                }else{
                    $ae->__SET('descripcion', $_POST['descripcionEmpresa']);
                }
                
                if(empty($_POST['ventasMensual'])){
                    $ae->__SET('ventasMensual',$nulo);
                }else{
                    $ae->__SET('ventasMensual', $_POST['ventasMensual']);
                }
                
                if(empty($_POST['noEmpleado'])){
                    $ae->__SET('numEmpleados',$nulo);
                }else{
                    $ae->__SET('numEmpleados', $_POST['noEmpleado']);
                }

                if(empty($_POST['noSucursal'])){
                    $ae->__SET('numSucursales',$nulo);
                }else{
                    $ae->__SET('numSucursales', $_POST['noSucursal']);
                }

                if($_POST['grupoEco'] == 'No' ){
                    $ae->__SET('grupoEconomico','No');

                }else{
                    $ae->__SET('grupoEconomico', $_POST['grupoEco']);
                }

                if(empty($_POST['grupoEco']))
                {
                    $ae->__SET('grupoEconomico','No');
                }
                
                if(empty($_POST['indicarGrupoEco'])){
                    $ae->__SET('indicar',$vaciotexto);
                }else{
                    $ae->__SET('indicar', $_POST['indicarGrupoEco']);
                }
                $ae->__SET('idPic', $_POST['idCli_PN']);
                $dtMon->editarDatosAE($ae);
                 
                  
                // --> INSERTANDO DATOS DE PRINCIPALES CLIENTES
                $nombrePC = $_POST['nombre_Cli'];
                $domicilioPC = $_POST['domicilio_Cli'];
                $telefonoPC = $_POST['telefono_Cli'];
                
                foreach ($nombrePC as $key => $pcl){
                     
                    $nombre =$pcl; 
                    $domicilio =$domicilioPC[$key]; 
                    $telefono = $telefonoPC[$key];
                                       
                    if(empty($nombre))
                    {
                        $pc->__SET('nombreClientePic','N/A');
                    }else{
                        $pc->__SET('nombreClientePic', $nombre);
                    }
                    if(empty($domicilio))
                    {
                        $pc->__SET('domicilio',164);
                    }else{
                        $pc->__SET('domicilio', $domicilio);
                    }

                    if(empty($telefono))
                    {
                        $pc->__SET('telefono',NULL);
                    }else{
                        $pc->__SET('telefono', $telefono);
                    }
                    
                    $pc->__SET('idPic', $_POST['idCli_PN']);
                    $pc->__SET('idPrincipalesClientes', $_POST['idPrincipalesClientes']);
                    
                    $dtMon->editarDatosPC($pc);      
                }
                           
             
                             
                // INSERTANDO DATOS DE -->  PRINCIPALES PROVEEDORES
          
                $nombrePP = $_POST['nombre_Prov'];
                $servicioPP = $_POST['servicio_Prov'];
                $domicilioPP = $_POST['domicilio_Prov'];
                $telefonoPP = $_POST['telefono_Prov'];
                
                foreach ($nombrePP as $key => $ppv){
                     
                    $nombreP =$ppv; 
                    $servicioP = $servicioPP[$key];
                    $domicilioP = $domicilioPP[$key]; 
                    $telefonoP = $telefonoPP[$key];
                                       
                    if(empty($nombreP))
                    {
                        $pp->__SET('nombreProveedor', 'N/A');
                    }else{
                        $pp->__SET('nombreProveedor', $nombreP);
                    }
                    
                    if(empty($servicioP))
                    {
                        $pp->__SET('servicio', NULL);
                    }else{
                        $pp->__SET('servicio', $servicioP);
                    }

                    if(empty($domicilioP))
                    {
                        $pp->__SET('domicilio',164);
                    }else{
                        $pp->__SET('domicilio', $domicilioP);
                    }

                    if(empty($telefonoP))
                    {
                        $pp->__SET('telefono',NULL);
                    }else{
                        $pp->__SET('telefono', $telefonoP);
                    }
                    
                    $pp->__SET('idPic', $_POST['idCli_PN']);
                    $pp->__SET('idPrincipalesProveedores', $_POST['idPrincipalesProveedores']);
                    $dtMon->editarDatosPP($pp);      
                }
              
            
           
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
                   $dtCom->editarFullPep($pep);      
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
                   
                   $dtCom->editarFullPep($pep);
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
                   $dtCom->editarFullFacta($facta);       
               }
               else{
                   $facta->__SET('Facta', 'No');
                   $facta->__SET('nombreFacta', $vaciotexto);
                   $facta->__SET('idRelacionCliente', $relacion);
                   $facta->__SET('idCausa', $causa);
                   $facta->__SET('idPic', $_POST['idCli_PN']);
                   $dtCom->editarFullFacta($facta);
               }
             
              
              //INSERTANDO DATOS DE --> INFORMACION DE INTERES

                if(empty($_POST['personalidadJ_II'])){
                        $info->__SET('idTipoPerJuridica',4);
                }else{
                    $info->__SET('idTipoPerJuridica', $_POST['personalidadJ_II']);
                } 

                if(empty($_POST['fechaConstitucion_II'])){
                    $info->__SET('idConstitucion',4);
                }else{
                    $info->__SET('idConstitucion', $_POST['fechaConstitucion_II']);
                } 

                $info->__SET('idCatalogoAE', $_POST['codigo']);

                if(empty($_POST['resultBusqueda_II'])){
                    $info->__SET('idBusquedaRes',3);
                }else{
                    $info->__SET('idBusquedaRes', $_POST['resultBusqueda_II']);
                } 

                if(empty($_POST['interes_LAE'])){
                    $info->__SET('idPaisAE',164);
                }else{
                    $info->__SET('idPaisAE', $_POST['interes_LAE']);
                }

                if(empty($_POST['interes_depto_LAE'])){
                    $info->__SET('idDepto',67);
                }else{
                    $info->__SET('idDepto', $_POST['interes_depto_LAE']);
                }
                $info->__SET('idPic', $_POST['idCli_PN']);

                $dtMon->editarDatosInteres($info);
               
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
