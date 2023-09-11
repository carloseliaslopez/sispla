<?php

include_once("Connect.php");

class DtBusquedaInterna extends Conexion
{
    private $myCon;
	public function registrarCircular(Circular $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Circular (fechaBusqueda, idOrganismo, subOrganismo,referencia, idEstado, usuario_creacion, fecha_creacion)
					VALUES (CURDATE(),?,?,?,1,?,current_timestamp());";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idOrganismo'),
			 $data->__GET('subOrganismo'),
			 $data->__GET('referencia'),
			 $data->__GET('usuario_creacion')));
			 
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarPerObligadas(PersonasObligadas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO PersonasObligadas (nombre, identificacion,nacionalidad,idCircular,usuario_creacion,idEstado, fecha_creacion)
					VALUES (?,?,?,?,?,1,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombre'),
			 $data->__GET('identificacion'),
			 $data->__GET('nacionalidad'),
			 $data->__GET('idCircular'),
			 $data->__GET('usuario_creacion')));
			 
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	public function obtenerPersonasObligadas($ref)
	{
		$Result = "";		
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idPersonasObligadas,nombre,identificacion,idCircular,concidencia,origen FROM vw_BusquedaInterna_Res WHERE  idCircular = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($ref));
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
				{
					$emp = new vw_BusquedaInterna_Res();			
					$Result = $emp->__SET('concidencia', $r->concidencia);
					if ($Result == null){
						
						$emp->__SET('idPersonasObligadas', $r->idPersonasObligadas);
						$emp->__SET('nombre', $r->nombre);
						$emp->__SET('identificacion', $r->identificacion);
						$emp->__SET('idCircular', $r->idCircular);
						$emp->__SET('busqueda', 'Negativo');
						//$emp->__SET('concidencia', 'N/A');
						$emp->__SET('origen', '-');
					}
					else{
						$emp->__SET('idPersonasObligadas', $r->idPersonasObligadas);
						$emp->__SET('nombre', $r->nombre);
						$emp->__SET('identificacion', $r->identificacion);
						$emp->__SET('idCircular', $r->idCircular);
						$emp->__SET('busqueda', 'Positivo');
						//$emp->__SET('concidencia', $r->concidencia);
						$emp->__SET('origen', $r->origen);
					}
					$result[] = $emp;
				}
			$this->myCon = parent::desconectar();
			return $result;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function listarCirculares()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCircular,DATE_FORMAT(fechaBusqueda, '%d/%m/%Y') AS fechaBusqueda, referencia, subOrganismo FROM Circular WHERE idEstado<>3 ";
			
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Circular();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idCircular', $r->idCircular);	
				$emp->__SET('fechaBusqueda', $r->fechaBusqueda);	
				$emp->__SET('referencia', $r->referencia);
				$emp->__SET('subOrganismo', $r->subOrganismo);

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

	public function registrarOrganismo(Organismo $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Organismo (nombreOrganismo,usuario_creacion,idEstado,fecha_creacion) VALUES(?,?,1,current_timestamp());";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreOrganismo'),
			 $data->__GET('usuario_creacion')));
			 
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ExisteOrganismo($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM Organismo WHERE nombreOrganismo = ? AND idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Organismo();

				$emp->__SET('idOrganismo', $r->idOrganismo);	
				$emp->__SET('nombreOrganismo', $r->nombreOrganismo);	
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
	
	

}