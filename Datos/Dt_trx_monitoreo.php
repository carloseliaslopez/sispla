<?php
include_once("Connect.php");

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

	public function tbl_TotalAlertas()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT  cliente, usuario, codRegla, nombreRegla, nombreOficina, nombreEstado, format(sum(MONTO),2) as 'Monto_Total' FROM vw_trx_alertas GROUP BY codRegla";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_trx_alertas();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('cliente', $r->cliente);
				$emp->__SET('usuario', $r->usuario);
				$emp->__SET('codRegla', $r->codRegla);
				$emp->__SET('nombreRegla', $r->nombreRegla);
				$emp->__SET('nombreOficina', $r->nombreOficina);
				$emp->__SET('nombreEstado', $r->nombreEstado);
				$emp->__SET('Monto_Total', $r->Monto_Total);
				
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






	/*
	public function BusquedaMensual()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			
			if (!isset($_POST['cbxOficina'])){
				$_POST['cbxOficina'] = "";
				$oficina = $_POST['cbxOficina'];
			}

			if (!isset($_POST['cbxRegla'])){
				$_POST['cbxRegla'] = "";
				$regla  = $_POST['cbxRegla'];
			}

			if (!isset($_POST['bcxEstadoS'])){
				$_POST['bcxEstadoS'] = "";
				$estadoRegla = $_POST['bcxEstadoS'];
			}

			$oficina = $_POST['cbxOficina'];
			$regla = $_POST['cbxRegla'];
			$estadoRegla = $_POST['bcxEstadoS'];

		 // $querySQL = "SELECT idSenial, autorizacion, cliente, usuario, cuenta, fechaProceso, operacion, monto, codRegla, paisTrx, idRegla, idOficina, idEstadoAlerta FROM trx_senial;
			//query a revisar el query 
			//$querySQL = "SELECT fechaIngreso,nombreCliente,PosibleCliente,origenC,Repreconyugue,PosibleRepresentante,origenRLC,accionistas,PosibleAccionista,origenABF
			//FROM BusquedaMensual WHERE fechaIngreso
			//BETWEEN '".$buscar."' AND '".$buscar2."' AND idEstado <> 3";
           
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Vw_BusquedaMensual();

				//_SET(CAMPOBD, atributoEntidad)
                $emp->__SET('fechaIngreso', $r->fechaIngreso);
				$emp->__SET('nombreCliente', $r->nombreCliente);	
				$emp->__SET('PosibleCliente', $r->PosibleCliente);	
				$emp->__SET('origenC', $r->origenC);
				$emp->__SET('Repreconyugue', $r->Repreconyugue);
				$emp->__SET('PosibleRepresentante', $r->PosibleRepresentante);
				$emp->__SET('origenRLC', $r->origenRLC);
				$emp->__SET('accionistas', $r->accionistas);
				$emp->__SET('PosibleAccionista', $r->PosibleAccionista);
				$emp->__SET('origenABF', $r->origenABF);

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
	*/
}
