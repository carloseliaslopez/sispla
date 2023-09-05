<?php
include_once("Connect.php");

class Gestion_Dt_ActiEconomica extends Conexion
{
    private $myCon;

    public function listarAE()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCatalogoAE, codigoCIIU, descripcionCIIU, idEstado FROM CatalogoAE WHERE idEstado <>3 ORDER BY idCatalogoAE DESC LIMIT 100 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoAE();

				$emp->__SET('idCatalogoAE', $r->idCatalogoAE);	
				$emp->__SET('codigoCIIU', $r->codigoCIIU);	
				$emp->__SET('descripcionCIIU', $r->descripcionCIIU);
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

	public function registrarAE(CatalogoAE $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO CatalogoAE (codigoCIIU, descripcionCIIU,idEstado) VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('codigoCIIU'),
             $data->__GET('descripcionCIIU'),
			 $data->__GET('idEstado')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteAE($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM CatalogoAE WHERE codigoCIIU = ? AND descripcionCIIU = ? AND idEstado <>3 ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a, $b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoAE();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idCatalogoAE', $r->idCatalogoAE);	
				$emp->__SET('codigoCIIU', $r->codigoCIIU);	
				$emp->__SET('descripcionCIIU', $r->descripcionCIIU);
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
	

	public function actualizarAE(CatalogoAE $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE CatalogoAE SET 
            codigoCIIU = ?,
            descripcionCIIU = ?,
            idEstado = ?
            WHERE idCatalogoAE  = ?;";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('codigoCIIU'), 
					$data->__GET('descripcionCIIU'),
					$data->__GET('idEstado'), 
					$data->__GET('idCatalogoAE')
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

	public function eliminarAE($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE CatalogoAE SET idEstado = 3
            WHERE idCatalogoAE  = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


    public function listar_vw_AE()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idRiesgo_Cat_Pais , idCatalogoAE,codigoCIIU, descripcionCIIU, idPais, nombrePais, calificacion_Cat_Pais, idEstado
            FROM vw_CatalogoAE WHERE idEstado <>3 ORDER BY idRiesgo_Cat_Pais DESC ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_CatalogoAE();

				$emp->__SET('idRiesgo_Cat_Pais', $r->idRiesgo_Cat_Pais);	
				$emp->__SET('idCatalogoAE', $r->idCatalogoAE);	
                $emp->__SET('codigoCIIU', $r->codigoCIIU);
				$emp->__SET('descripcionCIIU', $r->descripcionCIIU);
                $emp->__SET('idPais', $r->idPais);
                $emp->__SET('nombrePais', $r->nombrePais);
                $emp->__SET('calificacion_Cat_Pais', $r->calificacion_Cat_Pais);
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


public function listarpaisesCA()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCatalogoAE, codigoCIIU, descripcionCIIU, idEstado FROM CatalogoAE WHERE idEstado <>3 ORDER BY idCatalogoAE DESC LIMIT 100 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoAE();

				$emp->__SET('idCatalogoAE', $r->idCatalogoAE);	
				$emp->__SET('codigoCIIU', $r->codigoCIIU);	
				$emp->__SET('descripcionCIIU', $r->descripcionCIIU);
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

    public function registrarAExPais(Riesgo_Cat_Pais $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = " INSERT INTO Riesgo_Cat_Pais(idCatalogoAE, idPais, calificacion_Cat_Pais) VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idCatalogoAE'),
             $data->__GET('idPais'),
			 $data->__GET('calificacion_Cat_Pais')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function Existe_Riesgo_CxP($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM Riesgo_Cat_Pais WHERE idCatalogoAE = ? AND idPais = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a, $b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Riesgo_Cat_Pais();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idRiesgo_Cat_Pais', $r->idRiesgo_Cat_Pais);	
				$emp->__SET('idCatalogoAE', $r->idCatalogoAE);	
                $emp->__SET('codigoCIIU', $r->codigoCIIU);
				$emp->__SET('descripcionCIIU', $r->descripcionCIIU);
                $emp->__SET('idPais', $r->idPais);
                $emp->__SET('nombrePais', $r->nombrePais);
                $emp->__SET('calificacion_Cat_Pais', $r->calificacion_Cat_Pais);
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