<?php
include_once("Connect.php");

class Gestion_Dt_CatSubProducto extends Conexion
{
    private $myCon;

    public function listarSubProducto()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCatalogoSubProducto, nombreSubProducto, idCategoriaProducto,nombreCategoriaProducto, riesgoSubProducto, idEstado
                        FROM vw_CatalogoSubProducto_admin";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_CatalogoSubProducto_admin();
				$emp->__SET('idCatalogoSubProducto', $r->idCatalogoSubProducto);	
				$emp->__SET('nombreSubProducto', $r->nombreSubProducto);	
				$emp->__SET('idCategoriaProducto', $r->idCategoriaProducto);
                $emp->__SET('nombreCategoriaProducto', $r->nombreCategoriaProducto);	
                $emp->__SET('riesgoSubProducto', $r->riesgoSubProducto);
				
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

	public function registrarProducto(CatalogoSubProducto $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO CatalogoSubProducto (nombreSubProducto, idCategoriaProducto, riesgoSubProducto, idEstado)
                    VALUES (?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreSubProducto'),
			 $data->__GET('idCategoriaProducto'),
             $data->__GET('riesgoSubProducto'),
             $data->__GET('idEstado')
            ));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteProducto($a, $b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM CatalogoSubProducto WHERE nombreSubProducto= ? AND idCategoriaProducto = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a, $b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoSubProducto();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idCatalogoSubProducto', $r->idCatalogoSubProducto);	
				$emp->__SET('nombreSubProducto', $r->nombreSubProducto);	
				$emp->__SET('idCategoriaProducto', $r->idCategoriaProducto);
                $emp->__SET('nombreCategoriaProducto', $r->nombreCategoriaProducto);	
                $emp->__SET('riesgoSubProducto', $r->riesgoSubProducto);
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
	

	
	public function actualizarProducto(CatalogoSubProducto $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE CatalogoSubProducto SET
            nombreSubProducto = ?,
            idCategoriaProducto = ?,
            riesgoSubProducto = ?,
            idEstado  = ?
            WHERE idCatalogoSubProducto = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombreSubProducto'), 
					$data->__GET('idCategoriaProducto'),
					$data->__GET('riesgoSubProducto'), 
					$data->__GET('idEstado'),
                    $data->__GET('idCatalogoSubProducto')
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

	public function eliminarProducto($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE CatalogoSubProducto SET idEstado  = 3
                        WHERE idCatalogoSubProducto = ?";
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