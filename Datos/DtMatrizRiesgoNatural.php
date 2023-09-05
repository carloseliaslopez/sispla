<?php
include_once("Connect.php");

class DtMatrizRiesgoNatural extends Conexion
{
    private $myCon;

	public function listarMatriz_N()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idMatrizRiesgoNatural,cliente, lugarNacimiento,lugarNacionalidad,lugarResidencia,categoria,profesion,actividadEmpleo,lugarActividadEconomica,
							resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente, 
			 				DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') as 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado FROM MatrizRiesgoNatural where idEstado<>3 ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new MatrizRiesgoNatural();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idMatrizRiesgoNatural', $r->idMatrizRiesgoNatural);	
				$emp->__SET('cliente', $r->cliente);	
				$emp->__SET('lugarNacimiento', $r->lugarNacimiento);
				$emp->__SET('lugarNacionalidad', $r->lugarNacionalidad);
				$emp->__SET('lugarResidencia', $r->lugarResidencia);
				$emp->__SET('categoria', $r->categoria);
				$emp->__SET('profesion', $r->profesion);
				$emp->__SET('actividadEmpleo', $r->actividadEmpleo);
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
			$querySQL = "SELECT * FROM MatrizRiesgoNatural WHERE idCliente = ? AND productoSolicitado = ?  AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a,$b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new MatrizRiesgoNatural();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idMatrizRiesgoNatural', $r->idMatrizRiesgoNatural);	
				$emp->__SET('cliente', $r->cliente);	
				$emp->__SET('lugarNacimiento', $r->lugarNacimiento);
				$emp->__SET('lugarNacionalidad', $r->lugarNacionalidad);
				$emp->__SET('lugarResidencia', $r->lugarResidencia);
				$emp->__SET('categoria', $r->categoria);
				$emp->__SET('profesion', $r->profesion);
				$emp->__SET('actividadEmpleo', $r->actividadEmpleo);
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

	
    public function registrarMatriz_N(MatrizRiesgoNatural $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO MatrizRiesgoNatural 
				(idCliente,cliente, lugarNacimiento,lugarNacionalidad,lugarResidencia,categoria,profesion,actividadEmpleo,lugarActividadEconomica,
				resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente,
				fechaRealizacion,tipoCliente,paisMatriz,proximaRevision,idEstado) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,CURDATE(),?,?,?,?)";

			$this->myCon->prepare($sql)
			->execute(array(
			$data->__GET('idCliente'),
			$data->__GET('cliente'),
			$data->__GET('lugarNacimiento'),
			$data->__GET('lugarNacionalidad'),
			$data->__GET('lugarResidencia'),
			$data->__GET('categoria'),
			$data->__GET('profesion'),
			$data->__GET('actividadEmpleo'),
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
			$data->__GET('proximaRevision'),
			
			$data->__SET('idEstado',1)));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function listarMatriz_N_dias()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idMatrizRiesgoNatural,cliente, lugarNacimiento,lugarNacionalidad,lugarResidencia,categoria,profesion,actividadEmpleo,lugarActividadEconomica,
							resultadosBusquedas,condicionPEP,productoSolicitado,monto,formaPago,origenRecursos,riesgoCliente, 
			 				DATE_FORMAT(fechaRealizacion, '%d/%m/%Y') as 'fechaRealizacion',tipoCliente,paisMatriz,idCliente,idEstado,proximaRevision,diasRestantes
							FROM vw_MatrizRiesgoNatural 
							where idEstado<>3 ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_MatrizRiesgoNatural();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idMatrizRiesgoNatural', $r->idMatrizRiesgoNatural);	
				$emp->__SET('cliente', $r->cliente);	
				$emp->__SET('lugarNacimiento', $r->lugarNacimiento);
				$emp->__SET('lugarNacionalidad', $r->lugarNacionalidad);
				$emp->__SET('lugarResidencia', $r->lugarResidencia);
				$emp->__SET('categoria', $r->categoria);
				$emp->__SET('profesion', $r->profesion);
				$emp->__SET('actividadEmpleo', $r->actividadEmpleo);
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

