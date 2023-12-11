<?php
include_once("Connect.php");

class Dt_sig_Alertas extends Conexion
{
    private $myCon;

	public function registrar_d_centrales(sig_datos_centrales $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO sig_datos_centrales (fecha, estado_señal, nombre_cliente, tipo_alerta, id_alertas_diarias, usuario_creacion, fecha_creacion)
		        VALUES (?,?,?,?,?,?,current_timestamp());";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('fecha'),
			 $data->__GET('estado_señal'),
			 $data->__GET('nombre_cliente'),
             $data->__GET('tipo_alerta'),
			 $data->__GET('id_alertas_diarias'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    public function registrar_d_general(sig_datos_generales $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO sig_datos_generales (monto, tipo_pago, origenes_fondo, actividad_comercial, plastico, pais_origen, pais_destino, id_alertas_diarias, usuario_creacion, fecha_creacion)
		        VALUES (?,?,?,?,?,?,?,?,?,current_timestamp());";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('monto'),
			 $data->__GET('tipo_pago'),
			 $data->__GET('origenes_fondo'),
             $data->__GET('actividad_comercial'),
			 $data->__GET('plastico'),
             $data->__GET('pais_origen'),
             $data->__GET('pais_destino'),
             $data->__GET('id_alertas_diarias'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    public function registrar_d_acitom(sig_acc_tomadas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO sig_acc_tomadas (contacto_cliente, solicitud_info, reporte_ros, id_alertas_diarias, usuario_creacion, fecha_creacion)
		        VALUES (?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('contacto_cliente'),
			 $data->__GET('solicitud_info'),
			 $data->__GET('reporte_ros'),
             $data->__GET('id_alertas_diarias'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
    public function registrar_d_doc_recib(sig_doc_recibida $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO sig_doc_recibida (documento, observaciones, id_alertas_diarias, usuario_creacion, fecha_creacion )
		        VALUES (?,?,?,?,current_timestamp());";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('documento'),
			 $data->__GET('observaciones'),
             $data->__GET('id_alertas_diarias'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function registrar_d_asp_fin(sig_aspectos_finales $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO sig_aspectos_finales(acc_seguimiento, fecha_revision, oficina, id_alertas_diarias, usuario_creacion, fecha_creacion)
		        VALUES (?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('acc_seguimiento'),
			 $data->__GET('fecha_revision'),
             $data->__GET('oficina'),
             $data->__GET('id_alertas_diarias'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    

    public function Apt_alert(alertas_diarias $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE alertas_diarias SET usuario_modificacion = ?, idEstado = 3, fecha_modificacion = current_timestamp()
            WHERE id_alertas_diarias= ?";
				$this->myCon->prepare($sql)
			     ->execute(
				array(

					$data->__GET('usuario_modificacion'),
					$data->__GET('id_alertas_diarias')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function listar_informe()
	{
		try
		{


			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT id_alertas_diarias, fecha, estado_señal, nombre_cliente, regla, monto, tipo_pago, origenes_fondo, actividad_comercial, plastico, pais_origen, pais_destino, contacto_cliente, solicitud_info, reporte_ros, fecha_proceso, acc_seguimiento, fecha_revision, oficina FROM vw_informe_alertas;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_informe_alertas();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('id_alertas_diarias', $r->id_alertas_diarias);
				$emp->__SET('fecha', $r->fecha);
				$emp->__SET('estado_señal', $r->estado_señal);
				$emp->__SET('nombre_cliente', $r->nombre_cliente);
				$emp->__SET('regla', $r->regla);
				$emp->__SET('monto', $r->monto);
				$emp->__SET('tipo_pago', $r->tipo_pago);
				$emp->__SET('origenes_fondo', $r->origenes_fondo);
				$emp->__SET('actividad_comercial', $r->actividad_comercial);
				$emp->__SET('plastico', $r->plastico);
				$emp->__SET('pais_origen', $r->pais_origen);
				$emp->__SET('pais_destino', $r->pais_destino);
				$emp->__SET('contacto_cliente', $r->contacto_cliente);
				$emp->__SET('solicitud_info', $r->solicitud_info);
				$emp->__SET('reporte_ros', $r->reporte_ros);
				$emp->__SET('fecha_proceso', $r->fecha_proceso);
				$emp->__SET('acc_seguimiento', $r->acc_seguimiento);
				$emp->__SET('fecha_revision', $r->fecha_revision);
				$emp->__SET('oficina', $r->oficina);		
								
				$result[] = $emp;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}



}