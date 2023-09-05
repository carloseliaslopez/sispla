<?php
include_once("Connect.php");

class Gestion_DtFormaPago extends Conexion
{
    private $myCon;

    public function listarFP()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idFormaPago, nombreFormaPago, idEstado, riesgoFP FROM FormaPago WHERE idEstado<>3 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new FormaPago();

				
				$emp->__SET('idFormaPago', $r->idFormaPago);	
				$emp->__SET('nombreFormaPago', $r->nombreFormaPago);	
				$emp->__SET('idEstado', $r->idEstado);
                $emp->__SET('riesgoFP', $r->riesgoFP);	
				
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

	public function registrarFP(FormaPago $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO FormaPago (nombreFormaPago, idEstado, riesgoFP) 
		        VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreFormaPago'),
             $data->__GET('idEstado'),
			 $data->__GET('riesgoFP')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteFP($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM FormaPago WHERE nombreFormaPago = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$fp = new FormaPago();

				//_SET(CAMPOBD, atributoEntidad)
				$fp->__SET('idFormaPago', $r->idFormaPago);	
				$fp->__SET('nombreFormaPago', $r->nombreFormaPago);	
				$fp->__SET('idEstado', $r->idEstado);
                $fp->__SET('riesgoFP', $r->riesgoFP);
				
				$result[] = $fp;

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
	
	
	public function actualizarFP(FormaPago $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE FormaPago SET
            nombreFormaPago = ?,
            idEstado = ?,
            riesgoFP = ?
            WHERE idFormaPago = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombreFormaPago'), 
					$data->__GET('idEstado'),
					$data->__GET('riesgoFP'), 
					$data->__GET('idFormaPago')
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

	public function eliminarFP($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE FormaPago SET idEstado = 3
			where idFormaPago = ?";
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