<?php
include_once("Connect.php");

class DtClientes extends Conexion
{
    private $myCon;

    public function listarClientes()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idClientes, nombre,id, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso, origen, idEstado FROM Clientes WHERE idEstado<>3 ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Clientes();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idCliente', $r->idCliente);	
				$emp->__SET('nombre', $r->nombre);	
				$emp->__SET('id', $r->id);
				$emp->__SET('fechaIngreso', $r->fechaIngreso);
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

	public function comboFechaClientes()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idClientes, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso FROM Clientes WHERE idEstado<> 3 GROUP BY fechaIngreso ORDER BY fechaIngreso DESC";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboFechaCliente();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idCliente', $r->idCliente);
				$emp->__SET('fechaIngreso', $r->fechaIngreso);
				
				
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
  
	public function registrarClientes(Clientes $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Clientes (nombre,id,fechaIngreso,origen,idEstado) 
		        VALUES (?, ?, CURDATE(),'Clientes',1)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombre'),
			 $data->__GET('id')
			 ));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}




	public function ExisteCliente($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM Clientes WHERE nombre = ? AND id = ?  AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a,$b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$cliente = new Clientes();

				//_SET(CAMPOBD, atributoEntidad)
				$cliente->__SET('idCliente', $r->idCliente);	
				$cliente->__SET('nombre', $r->nombre);	
				$cliente->__SET('id', $r->id);
				$cliente->__SET('fechaIngreso', $r->fechaIngreso);
				$cliente->__SET('idEstado', $r->idEstado);
				
				$result[] = $cliente;

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