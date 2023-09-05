<?php
include_once("Connect.php");

class Gestion_DtPais extends Conexion
{
    private $myCon;

    public function listarPais()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idPais, nombrePais, calificacion, idEstado FROM Pais WHERE idEstado<>3 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Pais();

				
				$emp->__SET('idPais', $r->idPais);	
				$emp->__SET('nombrePais', $r->nombrePais);	
				$emp->__SET('calificacion', $r->calificacion);
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

	public function registrarPais(Pais $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Pais (nombrePais,calificacion,idEstado)
		        VALUES (?,?,1)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombrePais'),
			 $data->__GET('calificacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExistePais($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM Pais WHERE nombrePais = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$pais = new Pais();

				//_SET(CAMPOBD, atributoEntidad)
				$pais->__SET('idPais', $r->idPais);	
				$pais->__SET('nombrePais', $r->nombrePais);
                $pais->__SET('calificacion', $r->calificacion);	
				$pais->__SET('idEstado', $r->idEstado);	
			
				
				$result[] = $pais;

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
	
	public function actualizarPais(Pais $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE Pais SET 
			nombrePais = ?,
			calificacion = ?,
			idEstado = ?
			WHERE idPais = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombrePais'), 
					$data->__GET('calificacion'),
					$data->__GET('idEstado'), 
					$data->__GET('idPais')
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
			$querySQL = "UPDATE Pais SET idEstado = 3
			where idPais= ?";
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