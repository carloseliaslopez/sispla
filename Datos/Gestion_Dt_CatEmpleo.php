<?php
include_once("Connect.php");

class Gestion_Dt_CatEmpleo extends Conexion
{
    private $myCon;

    public function listarCatEmpleo()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCatalogoOCGO, codigoCGO, descripcionCGO, riesgoCGO, idEstado FROM catalogoocgo WHERE idEstado <> 3";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoOCGO();

				$emp->__SET('idCatalogoOCGO', $r->idCatalogoOCGO);	
				$emp->__SET('codigoCGO', $r->codigoCGO);	
                $emp->__SET('descripcionCGO', $r->descripcionCGO);	
				$emp->__SET('riesgoCGO', $r->riesgoCGO);
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

	public function registrarCatEmpleo(CatalogoOCGO $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO catalogoocgo (codigoCGO, descripcionCGO, riesgoCGO, idEstado) VALUES (?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('codigoCGO'),
			 $data->__GET('descripcionCGO'),
			 $data->__GET('riesgoCGO'),
             $data->__GET('idEstado')
            
            ));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function existeCatEmpleo($a, $b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT *  FROM catalogoocgo WHERE codigoCGO = ? AND descripcionCGO= ? AND idEstado<> 3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a, $b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoOCGO();

				$emp->__SET('idCatalogoOCGO', $r->idCatalogoOCGO);	
				$emp->__SET('codigoCGO', $r->codigoCGO);	
                $emp->__SET('descripcionCGO', $r->descripcionCGO);	
				$emp->__SET('riesgoCGO', $r->riesgoCGO);
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
		
	public function actualizarCatEmpleo(CatalogoOCGO $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE catalogoocgo SET 
				codigoCGO = ?,
				descripcionCGO = ?,
				riesgoCGO = ?,
				idEstado = ?
				WHERE idCatalogoOCGO = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('codigoCGO'), 
					$data->__GET('descripcionCGO'), 
					$data->__GET('riesgoCGO'),
					$data->__GET('idEstado'),
					$data->__GET('idCatalogoOCGO')
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

	public function eliminarCatEmpleo($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE catalogoocgo SET idEstado = 3
			WHERE idCatalogoOCGO = ?";
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