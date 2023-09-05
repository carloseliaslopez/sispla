<?php
include_once("Connect.php");

class Gestion_DtFFondos extends Conexion
{
    private $myCon;

    public function listarFF()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idFuenteFondos, nombreFuenteFondos, idEstado, riesgoFF FROM FuenteFondos WHERE idEstado<>3 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new FuenteFondos();

				$emp->__SET('idFuenteFondos', $r->idFuenteFondos);	
				$emp->__SET('nombreFuenteFondos', $r->nombreFuenteFondos);	
				$emp->__SET('idEstado', $r->idEstado);
                $emp->__SET('riesgoFF', $r->riesgoFF);	
				
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

	public function registrarFF(FuenteFondos $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO FuenteFondos (nombreFuenteFondos, idEstado, riesgoFF) VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreFuenteFondos'),
             $data->__GET('idEstado'),
			 $data->__GET('riesgoFF')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteFF($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM FuenteFondos WHERE nombreFuenteFondos = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new FuenteFondos();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idFuenteFondos', $r->idFuenteFondos);	
				$emp->__SET('nombreFuenteFondos', $r->nombreFuenteFondos);	
				$emp->__SET('idEstado', $r->idEstado);
                $emp->__SET('riesgoFF', $r->riesgoFF);	
			
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
	

	public function actualizarFF(FuenteFondos $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE FuenteFondos SET 
            nombreFuenteFondos = ?,
            idEstado = ?,
            riesgoFF = ?
            WHERE idFuenteFondos = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombreFuenteFondos'), 
					$data->__GET('idEstado'),
					$data->__GET('riesgoFF'), 
					$data->__GET('idFuenteFondos')
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

	public function eliminarPais($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE FuenteFondos SET idEstado = 3
			where idFuenteFondos= ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

}