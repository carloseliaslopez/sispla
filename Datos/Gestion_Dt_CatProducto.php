<?php
include_once("Connect.php");

class Gestion_Dt_CatProducto extends Conexion
{
    private $myCon;

    public function listarCatProducto()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCategoriaProducto, nombreCategoriaProducto, idEstado FROM CategoriaProducto WHERE idEstado<>3";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CategoriaProducto();

				$emp->__SET('idCategoriaProducto', $r->idCategoriaProducto);	
				$emp->__SET('nombreCategoriaProducto', $r->nombreCategoriaProducto);	
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

	public function registrarCatProducto(CategoriaProducto $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO CategoriaProducto (nombreCategoriaProducto, idEstado) VALUES (?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreCategoriaProducto'),
             $data->__GET('idEstado')
            
            ));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function existeCatProducto($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM CategoriaProducto WHERE nombreCategoriaProducto = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CategoriaProducto();

				$emp->__SET('idCategoriaProducto', $r->idCategoriaProducto);	
				$emp->__SET('nombreCategoriaProducto', $r->nombreCategoriaProducto);	
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
		
	public function actualizarCatProducto(CategoriaProducto $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE CategoriaProducto SET 
            nombreCategoriaProducto = ?,
            idEstado = ?
            WHERE idCategoriaProducto =?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombreCategoriaProducto'), 
					$data->__GET('idEstado'), 
					$data->__GET('idCategoriaProducto')
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

	public function eliminarCatProducto($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE CategoriaProducto SET  idEstado = 3
            WHERE idCategoriaProducto =?";
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