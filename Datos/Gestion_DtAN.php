<?php
include_once("Connect.php");

class Gestion_DtAN extends Conexion
{
    private $myCon;

    public function listarAN()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idActividadNegocio, nombreActividadNegocio, idEstado FROM actividadnegocio WHERE idEstado<>3 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ActividadNegocio();

				$emp->__SET('idActividadNegocio', $r->idActividadNegocio);	
				$emp->__SET('nombreActividadNegocio', $r->nombreActividadNegocio);	
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

	public function registrarAN(ActividadNegocio $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO actividadnegocio(nombreActividadNegocio, idEstado) VALUES (?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreActividadNegocio'),
             $data->__GET('idEstado')
            
            ));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ExisteAN($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM actividadnegocio WHERE nombreActividadNegocio = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ActividadNegocio();

				$emp->__SET('idActividadNegocio', $r->idActividadNegocio);	
				$emp->__SET('nombreActividadNegocio', $r->nombreActividadNegocio);	
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
		
	public function actualizarAN(ActividadNegocio $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE actividadnegocio SET 
            nombreActividadNegocio = ?,
            idEstado = ?
            WHERE idActividadNegocio = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombreActividadNegocio'), 
					$data->__GET('idEstado'), 
					$data->__GET('idActividadNegocio')
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

	public function eliminarAN($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE actividadnegocio SET idEstado = 3
			where idActividadNegocio= ?";
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