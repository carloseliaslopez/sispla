<?php
include_once("Connect.php");

class Gestion_DtDepartamento extends Conexion
{
    private $myCon;

    public function listarDepartamento()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idDepartamento,nombreDepartamento,calificacion,idEstado,idPais,nombrePais  FROM vw_Departamento";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_Departamento();
				$emp->__SET('idDepartamento', $r->idDepartamento);	
				$emp->__SET('nombreDepartamento', $r->nombreDepartamento);	
				$emp->__SET('calificacion', $r->calificacion);
                $emp->__SET('idEstado', $r->idEstado);	
                $emp->__SET('idPais', $r->idPais);
                $emp->__SET('nombrePais', $r->nombrePais);
				
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

	public function registrarDepartamento(Departamento $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Departamento (nombreDepartamento,calificacion,idEstado,idPais)
		        VALUES (?,?,1,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreDepartamento'),
			 $data->__GET('calificacion'),
             $data->__GET('idPais')
            ));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteDepartamento($a, $b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM Departamento WHERE nombreDepartamento= ? AND idPais = ? AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a, $b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Departamento();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idDepartamento', $r->idDepartamento);	
				$emp->__SET('nombreDepartamento', $r->nombreDepartamento);	
				$emp->__SET('calificacion', $r->calificacion);
                $emp->__SET('idEstado', $r->idEstado);	
                $emp->__SET('idPais', $r->idPais);
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
	

	
	public function actualizarDepartamento(Departamento $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE Departamento SET 
			nombreDepartamento = ?,
			calificacion = ?,
			idEstado = ?,
            idPais = ?
			WHERE idDepartamento = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					$data->__GET('nombreDepartamento'), 
					$data->__GET('calificacion'),
					$data->__GET('idEstado'), 
					$data->__GET('idPais'),
                    $data->__GET('idDepartamento')
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

	public function eliminarDepartamento($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE Departamento SET idEstado = 3
			where idDepartamento= ?";
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