<?php
include_once("Connect.php");

class Gestion_DtAG extends Conexion
{
    private $myCon;

    public function listarAG()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idAreaGeografica, nombreAreaGeografica, idEstado FROM areageografica WHERE idEstado<>3 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new AreaGeografica();

				$emp->__SET('idAreaGeografica', $r->idAreaGeografica);	
				$emp->__SET('nombreAreaGeografica', $r->nombreAreaGeografica);	
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

	public function registrarAG(AreaGeografica $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO areageografica (nombreAreaGeografica, idEstado)
		        VALUES (?,1)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 
			 $data->__GET('nombreAreaGeografica')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteAG($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM areageografica WHERE nombreAreaGeografica = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new AreaGeografica();

				$emp->__SET('idAreaGeografica', $r->idAreaGeografica);	
				$emp->__SET('nombreAreaGeografica', $r->nombreAreaGeografica);	
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
		
	public function actualizarAG(AreaGeografica $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE areageografica SET
            nombreAreaGeografica = ?,
            idEstado = ?
            WHERE idAreaGeografica = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombreAreaGeografica'), 
					$data->__GET('idEstado'), 
					$data->__GET('idAreaGeografica')
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

	public function eliminarAG($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE areageografica SET idEstado = 3
			where idAreaGeografica= ?";
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