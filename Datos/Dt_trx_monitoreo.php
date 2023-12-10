<?php
include_once("Connect.php");
include_once("Connect_monitoreo.php");

class Dt_trx_monitoreo extends Conexion
{
    private $myCon;

    public function ComboOficina()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idOficina, nombreOficina, paisOficina, idEstado FROM trx_oficina WHERE idEstado <>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Trx_oficina();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idOficina', $r->idOficina);
				$emp->__SET('nombreOficina', $r->nombreOficina);
                $emp->__SET('paisOficina', $r->paisOficina);
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

	public function ComboRegla()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idRegla, nombreRegla, criterio, riesgo, idEstado FROM trx_regla WHERE idEstado <>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Trx_regla();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idRegla', $r->idRegla);
				$emp->__SET('nombreRegla', $r->nombreRegla);
                $emp->__SET('criterio', $r->criterio);
				$emp->__SET('riesgo', $r->riesgo);
				$emp->__SET('idEstado', $r->idEstado);
				
				
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

	public function ComboEstadoAlerta()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idEstadoAlerta, nombreEstado, idEstado FROM trx_estadoalerta WHERE idEstado <>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Trx_estadoAlerta();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idEstadoAlerta', $r->idEstadoAlerta);
				$emp->__SET('nombreEstado', $r->nombreEstado);
				$emp->__SET('idEstado', $r->idEstado);
				
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

	
	public function ComboCatDocumentacion()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idDocumento, nombreDocumento, idEstado FROM trx_cat_doc_recibida WHERE idEstado <>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new trx_cat_doc_recibida();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idDocumento', $r->idDocumento);
				$emp->__SET('nombreDocumento', $r->nombreDocumento);
				$emp->__SET('idEstado', $r->idEstado);
				
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

	public function tbl_TotalAlertas()
	{
		try
		{


			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT id_alertas_diarias, nombre_cliente, plastico,fecha_proceso, format (monto, 2) as 'monto' , regla, oficina FROM alertas_diarias WHERE estado_regla<>'Cerrada'and idEstado<>3 ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new alertas_diarias();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('id_alertas_diarias', $r->id_alertas_diarias);
				$emp->__SET('nombre_cliente', $r->nombre_cliente);
				$emp->__SET('plastico', $r->plastico);
				$emp->__SET('monto', $r->monto);
				$emp->__SET('regla', $r->regla);
				$emp->__SET('oficina', $r->oficina);
				$emp->__SET('estado_regla', $r->estado_regla);
				$emp->__SET('idEstado', $r->idEstado);
				
								
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

	public function ObtenerAlerta($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT id_alertas_diarias, nombre_cliente, plastico,fecha_proceso, format (monto, 2) as 'monto' , regla, oficina FROM alertas_diarias WHERE id_alertas_diarias = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new alertas_diarias();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('id_alertas_diarias', $r->id_alertas_diarias);	
				$emp->__SET('nombre_cliente', $r->nombre_cliente);	
				$emp->__SET('plastico', $r->plastico);
				$emp->__SET('fecha_proceso', $r->fecha_proceso);
				$emp->__SET('monto', $r->monto);
                $emp->__SET('regla', $r->regla);
                $emp->__SET('oficina', $r->oficina);
                

				$result = $emp;

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


