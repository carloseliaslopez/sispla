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
			$querySQL = "SELECT idCatalogo_Acti_Economica, codigoCIIU, descripcion, idPais, calificacion, idEstado FROM catalogo_acti_economica WHERE idEstado <>3 ORDER BY idCatalogoAE DESC LIMIT 100 ";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new catalogo_acti_economica();

				$emp->__SET('idCatalogo_Acti_Economica', $r->idCatalogo_Acti_Economica);	
				$emp->__SET('codigoCIIU', $r->codigoCIIU);	
				$emp->__SET('descripcion', $r->descripcion);
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

	public function registrarAE(catalogo_acti_economica $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO catalogo_acti_economica (codigoCIIU, descripcion,idEstado) VALUES (?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('codigoCIIU'),
             $data->__GET('descripcion'),
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
			$querySQL = "SELECT * FROM catalogo_acti_economica WHERE codigoCIIU = ? AND descripcion = ? AND idEstado <>3 ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a, $b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new catalogo_acti_economica();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idCatalogo_Acti_Economica', $r->idCatalogo_Acti_Economica);	
				$emp->__SET('codigoCIIU', $r->codigoCIIU);	
				$emp->__SET('descripcion', $r->descripcion);
                $emp->__SET('idPais', $r->idPais);
				$emp->__SET('calificacion', $r->calificacion);
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
	

	public function actualizarAE(catalogo_acti_economica $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE catalogo_acti_economica SET 
            codigoCIIU = ?,
            descripcion = ?,
            idEstado = ?
            WHERE idCatalogo_Acti_Economica  = ?;";

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




	}