<?php
include_once("Connect.php");

class DtListasInternas extends Conexion
{
    private $myCon;

    public function listarListasInternas()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idListasInternas, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso, nombre, origen, idEstado FROM ListasInternas WHERE idEstado<>3 ORDER BY idListasInternas DESC LIMIT 500";
           
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ListasInternas();

				//_SET(CAMPOBD, atributoEntidad)
                $emp->__SET('idListasInternas', $r->idListasInternas);
				$emp->__SET('nombre', $r->nombre);	
				$emp->__SET('origen', $r->origen);	
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

	public function BuscarListaInterna()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			if (!isset($_POST['buscar'])){
				$_POST['buscar'] = "";
				$buscar = $buscar = $_POST['buscar'];
				
			}
			$buscar = $_POST['buscar'];
			$arr = explode(" ",$buscar);
				$arr[0];
				$arr[1];
				$arr[2];
				$arr[3];
				$arr[4];
				$arr[5];
			$querySQL = "SELECT idListasInternas,nombre,origen,DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso,idEstado
			FROM ListasInternas
			 WHERE nombre LIKE'%".$arr[0]."%'  and
			 nombre like'%".$arr[1]."%' and
			 nombre like'%".$arr[2]."%' and 
			 nombre like'%".$arr[3]."%' and 
			 nombre like'%".$arr[4]."%' and 
			 nombre like'%".$arr[5]."%' and
			 idEstado <> 3 ";
           
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ListasInternas();

				//_SET(CAMPOBD, atributoEntidad)
                $emp->__SET('idListasInternas', $r->idListasInternas);
				$emp->__SET('nombre', $r->nombre);	
				$emp->__SET('origen', $r->origen);	
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


	public function registrarListaInterna(ListasInternas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO ListasInternas (nombre,origen,fechaIngreso,idEstado) 
		        VALUES (?, ?, CURDATE(),?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombre'),
			 $data->__GET('origen'),
			 $data->__SET('idEstado',1)));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
  

	public function actualizarListaInterna(ListasInternas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE ListasInternas SET 
			nombre = ?, 
			
			idEstado = 2
			where idListasInternas = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					
					$data->__GET('nombre'), 
					$data->__GET('idListasInternas')
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

	public function ExisteListaInterna($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idListasInternas,nombre,origen,fechaIngreso,idEstado
			FROM ListasInternas WHERE nombre = ? AND origen = ?  AND idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a,$b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$li = new ListasInternas();

				//_SET(CAMPOBD, atributoEntidad)
				$li->__SET('idListasInternas', $r->idListasInternas);	
				$li->__SET('nombre', $r->nombre);	
				$li->__SET('origen', $r->origen);
				$li->__SET('fechaIngreso', $r->fechaIngreso);
				$li->__SET('idEstado', $r->idEstado);
				
				$result[] = $li;

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

	
	public function obtenerListaInterna($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idListasInternas,nombre,origen,fechaIngreso,idEstado 
			FROM ListasInternas WHERE idListasInternas = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			
			$r = $stm->fetch(PDO::FETCH_OBJ);

			$emp = new ListasInternas();
			//_SET(CAMPOBD, atributoEntidad)
			$emp->__SET('idListasInternas', $r->idListasInternas);
			$emp->__SET('nombre', $r->nombre);	
			$emp->__SET('origen', $r->origen);	
			$emp->__SET('fechaIngreso', $r->fechaIngreso);
			$emp->__SET('idEstado', $r->idEstado);
			
			$this->myCon = parent::desconectar();
			return $emp;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function EliminarListaInterna($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE ListasInternas SET idEstado = 3
			WHERE idListasInternas = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function replaceListaInterna(ListasInternas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "CALL sp_insert_list (?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombre'),
			 $data->__GET('origen'),
			 $data->__GET('fechaIngreso'),
			 $data->__GET('idEstado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



}