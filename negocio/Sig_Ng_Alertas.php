<?php

include_once("../Entidades/sig_alertas/sig_acc_tomadas.php");
include_once("../Entidades/sig_alertas/sig_aspectos_finales.php");
include_once("../Entidades/sig_alertas/sig_datos_centrales.php");
include_once("../Entidades/sig_alertas/sig_datos_generales.php");
include_once("../Entidades/sig_alertas/sig_doc_recibida.php");
include_once ("../Entidades/Trx_monitoreo/alertas_diarias.php");

include_once ("../Datos/Dt_sig_Alertas.php");

$dc = new sig_datos_centrales();
$dg = new sig_datos_generales();
$at = new sig_acc_tomadas();
$drec = new sig_doc_recibida();
$aspf = new sig_aspectos_finales();
$alert = new alertas_diarias();

$dtMon = new Dt_sig_Alertas();

if ($_POST) 
{
    $varAccion = $_POST['txtaccion'];

    switch ($varAccion) 
    {
        case '1':
            try 
            {
                /*

                // --> INSERTANDO DATOS GENERALES
                $dc->__SET('fecha', $_POST['fecha_MR_J']);
                $dc->__SET('estado_señal', $_POST['bcxEstadoS']);
                $dc->__SET('nombre_cliente', $_POST['txt_nombre_cliente']);
                $dc->__SET('tipo_alerta', $_POST['txt_regla_asig']);
                $dc->__SET('id_alertas_diarias', $_POST['id_senial_alert']);
                $dc->__SET('usuario_creacion', $_POST['idUsuario']);
                $dtMon->registrar_d_centrales($dc);

                $dg->__SET('monto', $_POST['txt_monto']);
                $dg->__SET('tipo_pago', $_POST['txt_metodo_pago']);
                $dg->__SET('origenes_fondo', $_POST['txt_origen_fondo']);
                $dg->__SET('actividad_comercial', $_POST['txt_acti_comercial']);
                $dg->__SET('plastico', $_POST['txt_cuenta']);
                $dg->__SET('pais_origen', $_POST['txt_origen_pais_trx']);
                $dg->__SET('pais_destino', $_POST['txt_destino_pais_trx']);
                $dg->__SET('id_alertas_diarias', $_POST['id_senial_alert']);
                $dg->__SET('usuario_creacion', $_POST['idUsuario']);
                $dtMon->registrar_d_general($dg);
                

                $at->__SET('contacto_cliente', $_POST['cbx_contac_cli']);
                $at->__SET('solicitud_info', $_POST['cbx_sol_adicional']);
                $at->__SET('reporte_ros', $_POST['cbx_rep_ros']);
                $at->__SET('id_alertas_diarias', $_POST['id_senial_alert']);
                $at->__SET('usuario_creacion', $_POST['idUsuario']);
                $dtMon->registrar_d_acitom($at);


                $nombre_doc = $_POST['nombreDoc_ME_J'];
                $comentario_doc = $_POST['comentario_ME_J'];

                foreach ($nombre_doc as $key => $n){
                    
                    $nombre =$n; 
                    $comentario= $comentario_doc[$key]; 

                    $drec->__SET('documento', $nombre);
                    $drec->__SET('observaciones', $comentario);

                    $drec->__SET('id_alertas_diarias', $_POST['id_senial_alert']);
                    $drec->__SET('usuario_creacion', $_POST['idUsuario']);
                    $dtMon->registrar_d_doc_recib($drec);
                    
                }

              
                $aspf->__SET('acc_seguimiento', $_POST['trx_acc_seguim']);
                $aspf->__SET('fecha_revision', $_POST['txt_fecha_rev']);
                $aspf->__SET('oficina', $_POST['txt_oficina']);
                $aspf->__SET('id_alertas_diarias', $_POST['id_senial_alert']);
                $aspf->__SET('usuario_creacion', $_POST['idUsuario']);
                $dtMon->registrar_d_asp_fin($aspf);

                */
                $alert->__SET('id_alertas_diarias', $_POST['id_senial_alert']);
                $alert->__SET('usuario_modificacion', $_POST['idUsuario']);
                $dtMon->Apt_alert($alert);


                header("Location: ../dist/Trx_alertas_diarias.php");

			
            } 
            catch (Exception $e) 
            {
                header("Location: ../dist/Trx_alertas_diarias.php?msjNewEmp=2");
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
