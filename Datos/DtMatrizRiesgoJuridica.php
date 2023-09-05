<?php
include_once("Connect.php");

class DtMatrizRiesgoJuridica extends Conexion
{
    private $myCon;

	public function listarMatriz_J()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idMatrizRiesgoJuridico,cliente, lugarConstitucion, lugarNacimiento_RL, lugarNacionalidad_RL,lugarResidencia_RL, lugarNacionalidad_ACM, lugarNacionalidad_BFM, 
			personalidadJuridica,fechaConstitucion,actividadEconomica,lugarActividadEconomica,
			resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente,
			DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') AS 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado,proximaRevision
			FROM MatrizRiesgoJuridico 
			WHERE idEstado<>3 ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new MatrizRiesgoJuridico();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idMatrizRiesgoJuridico', $r->idMatrizRiesgoJuridico);	
				$emp->__SET('cliente', $r->cliente);	
				$emp->__SET('lugarConstitucion', $r->lugarConstitucion);
				$emp->__SET('lugarNacimiento_RL', $r->lugarNacimiento_RL);
				$emp->__SET('lugarNacionalidad_RL', $r->lugarNacionalidad_RL);
				$emp->__SET('lugarResidencia_RL', $r->lugarResidencia_RL);
				$emp->__SET('lugarNacionalidad_ACM', $r->lugarNacionalidad_ACM);
				$emp->__SET('lugarNacionalidad_BFM', $r->lugarNacionalidad_BFM);
				$emp->__SET('personalidadJuridica', $r->personalidadJuridica);
				$emp->__SET('fechaConstitucion', $r->fechaConstitucion);
				$emp->__SET('actividadEconomica', $r->actividadEconomica);
				$emp->__SET('lugarActividadEconomica', $r->lugarActividadEconomica);
				$emp->__SET('resultadosBusquedas', $r->resultadosBusquedas);
				$emp->__SET('condicionPEP', $r->condicionPEP);
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('monto', $r->monto);
				$emp->__SET('formaPago', $r->formaPago);
				$emp->__SET('origenRecursos', $r->origenRecursos);
				$emp->__SET('riesgoCliente', $r->riesgoCliente);
				$emp->__SET('fechaRealizacion', $r->fechaRealizacion);
				$emp->__SET('tipoCliente', $r->tipoCliente);
				$emp->__SET('paisMatriz', $r->paisMatriz);
				$emp->__SET('idCliente', $r->idCliente);
				$emp->__SET('idEstado', $r->idEstado);
				$emp->__SET('proximaRevision', $r->proximaRevision);
				$result[] = $emp;

				//var_dump($result);
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function ExisteEvaluacion($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM MatrizRiesgoJuridico WHERE idCliente = ? AND productoSolicitado = ?  AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a,$b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new MatrizRiesgoJuridico();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idMatrizRiesgoJuridico', $r->idMatrizRiesgoJuridico);	
				$emp->__SET('cliente', $r->cliente);	
				$emp->__SET('lugarConstitucion', $r->lugarConstitucion);
				$emp->__SET('lugarNacimiento_RL', $r->lugarNacimiento_RL);
				$emp->__SET('lugarNacionalidad_RL', $r->lugarNacionalidad_RL);
				$emp->__SET('lugarResidencia_RL', $r->lugarResidencia_RL);
				$emp->__SET('lugarNacionalidad_ACM', $r->lugarNacionalidad_ACM);
				$emp->__SET('lugarNacionalidad_BFM', $r->lugarNacionalidad_BFM);
				$emp->__SET('personalidadJuridica', $r->personalidadJuridica);
				$emp->__SET('fechaConstitucion', $r->fechaConstitucion);
				$emp->__SET('actividadEconomica', $r->actividadEconomica);
				$emp->__SET('lugarActividadEconomica', $r->lugarActividadEconomica);
				$emp->__SET('resultadosBusquedas', $r->resultadosBusquedas);
				$emp->__SET('condicionPEP', $r->condicionPEP);
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('monto', $r->monto);
				$emp->__SET('formaPago', $r->formaPago);
				$emp->__SET('origenRecursos', $r->origenRecursos);
				$emp->__SET('riesgoCliente', $r->riesgoCliente);
				$emp->__SET('fechaRealizacion', $r->fechaRealizacion);
				$emp->__SET('tipoCliente', $r->tipoCliente);
				$emp->__SET('paisMatriz', $r->paisMatriz);
				$emp->__SET('idCliente', $r->idCliente);
				$emp->__SET('idEstado', $r->idEstado);
				
				$result[] = $emp;

				//var_dump($result);
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function registrarMatriz_J(MatrizRiesgoJuridico $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO MatrizRiesgoJuridico 
				(idCliente, cliente, lugarConstitucion, lugarNacimiento_RL, lugarNacionalidad_RL,lugarResidencia_RL, lugarNacionalidad_ACM, lugarNacionalidad_BFM, 
				personalidadJuridica,fechaConstitucion,actividadEconomica,lugarActividadEconomica,
				resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente,
				fechaRealizacion,tipoCliente,paisMatriz,idEstado,proximaRevision) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURDATE(),?,?,?,?)";

			$this->myCon->prepare($sql)
			->execute(array(
			$data->__GET('idCliente'),
			$data->__GET('cliente'),
			$data->__GET('lugarConstitucion'),
			$data->__GET('lugarNacimiento_RL'),
			$data->__GET('lugarNacionalidad_RL'),
			$data->__GET('lugarResidencia_RL'),
			$data->__GET('lugarNacionalidad_ACM'),
			$data->__GET('lugarNacionalidad_BFM'),
			$data->__GET('personalidadJuridica'),
			$data->__GET('fechaConstitucion'),
			$data->__GET('actividadEconomica'),
			$data->__GET('lugarActividadEconomica'),
			$data->__GET('resultadosBusquedas'),
			$data->__GET('condicionPEP'),
			$data->__GET('productoSolicitado'),
			$data->__GET('monto'),
			$data->__GET('formaPago'),
			$data->__GET('origenRecursos'),
			$data->__GET('riesgoCliente'),
			$data->__GET('tipoCliente'),
			$data->__GET('paisMatriz'),
			$data->__SET('idEstado',1),
			$data->__GET('proximaRevision')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function listarMatriz_J_dias()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idMatrizRiesgoJuridico,cliente, lugarConstitucion, lugarNacimiento_RL, lugarNacionalidad_RL,lugarResidencia_RL, lugarNacionalidad_ACM, lugarNacionalidad_BFM, 
			personalidadJuridica,fechaConstitucion,actividadEconomica,lugarActividadEconomica,
			resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente,
			DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') AS 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado,proximaRevision,diasRestantes
			FROM vw_MatrizRiesgoJuridico 
			WHERE idEstado<>3 ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_MatrizRiesgoJuridico();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idMatrizRiesgoJuridico', $r->idMatrizRiesgoJuridico);	
				$emp->__SET('cliente', $r->cliente);	
				$emp->__SET('lugarConstitucion', $r->lugarConstitucion);
				$emp->__SET('lugarNacimiento_RL', $r->lugarNacimiento_RL);
				$emp->__SET('lugarNacionalidad_RL', $r->lugarNacionalidad_RL);
				$emp->__SET('lugarResidencia_RL', $r->lugarResidencia_RL);
				$emp->__SET('lugarNacionalidad_ACM', $r->lugarNacionalidad_ACM);
				$emp->__SET('lugarNacionalidad_BFM', $r->lugarNacionalidad_BFM);
				$emp->__SET('personalidadJuridica', $r->personalidadJuridica);
				$emp->__SET('fechaConstitucion', $r->fechaConstitucion);
				$emp->__SET('actividadEconomica', $r->actividadEconomica);
				$emp->__SET('lugarActividadEconomica', $r->lugarActividadEconomica);
				$emp->__SET('resultadosBusquedas', $r->resultadosBusquedas);
				$emp->__SET('condicionPEP', $r->condicionPEP);
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('monto', $r->monto);
				$emp->__SET('formaPago', $r->formaPago);
				$emp->__SET('origenRecursos', $r->origenRecursos);
				$emp->__SET('riesgoCliente', $r->riesgoCliente);
				$emp->__SET('fechaRealizacion', $r->fechaRealizacion);
				$emp->__SET('tipoCliente', $r->tipoCliente);
				$emp->__SET('paisMatriz', $r->paisMatriz);
				$emp->__SET('idCliente', $r->idCliente);
				$emp->__SET('idEstado', $r->idEstado);
				$emp->__SET('proximaRevision', $r->proximaRevision);
				$emp->__SET('diasRestantes', $r->diasRestantes);
				
				$result[] = $emp;

				//var_dump($result);
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