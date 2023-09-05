<?php
include_once("Connect.php");

class DtEmpleados extends Conexion
{
    private $myCon;

    public function listarEmpleados()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idEmpleados, nombre, ubicacion, nombreEmpresa, areaLaboral, puesto, fechaIngreso, idEstado, origen FROM Empleados WHERE idEstado<>3 ";
            
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Empleados();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idEmpleados', $r->idEmpleados);	
				$emp->__SET('nombre', $r->nombre);	
				$emp->__SET('ubicacion', $r->ubicacion);
                $emp->__SET('nombreEmpresa', $r->nombreEmpresa);	
				$emp->__SET('areaLaboral', $r->areaLaboral);	
				$emp->__SET('puesto', $r->puesto);
				$emp->__SET('fechaIngreso', $r->fechaIngreso);
				$emp->__SET('idEstado', $r->idEstado);
                $emp->__SET('origen', $r->origen);

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

	public function registrarEmpleado(Empleados $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Empleados(nombre,ubicacion,nombreEmpresa,areaLaboral,puesto,fechaIngreso,idEstado,origen)
		        VALUES (?,?,?,?,?, CURDATE(),1,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombre'),
			 $data->__GET('ubicacion'),
			 $data->__GET('nombreEmpresa'),
			 $data->__GET('areaLaboral'),
			 $data->__GET('puesto'),
			 
			 $data->__SET('origen','Empleados')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteEmpleado($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM Empleados WHERE nombre = ?  AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Empleados();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idEmpleados', $r->idEmpleados);	
				$emp->__SET('nombre', $r->nombre);	
				$emp->__SET('ubicacion', $r->ubicacion);
                $emp->__SET('nombreEmpresa', $r->nombreEmpresa);	
				$emp->__SET('areaLaboral', $r->areaLaboral);	
				$emp->__SET('puesto', $r->puesto);
				$emp->__SET('fechaIngreso', $r->fechaIngreso);
				$emp->__SET('idEstado', $r->idEstado);
                $emp->__SET('origen', $r->origen);

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
	

	public function ObtenerEmpleado($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM Empleados WHERE idEmpleados = ?  AND idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Empleados();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idEmpleados', $r->idEmpleados);	
				$emp->__SET('nombre', $r->nombre);	
				$emp->__SET('ubicacion', $r->ubicacion);
                $emp->__SET('nombreEmpresa', $r->nombreEmpresa);	
				$emp->__SET('areaLaboral', $r->areaLaboral);	
				$emp->__SET('puesto', $r->puesto);
				$emp->__SET('fechaIngreso', $r->fechaIngreso);
				$emp->__SET('idEstado', $r->idEstado);
                $emp->__SET('origen', $r->origen);

				$result = $emp;
			}
			$this->myCon = parent::desconectar();
			return $result;
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}
	
	public function actualizarEmpleados(Empleados $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE Empleados SET nombre = ?, ubicacion = ?, nombreEmpresa = ?,areaLaboral = ?, puesto = ?, idEstado= 2 
            WHERE idEmpleados= ?";
				$this->myCon->prepare($sql)
			     ->execute(
				array(
					
					$data->__GET('nombre'), 
					$data->__GET('ubicacion'),
					$data->__GET('nombreEmpresa'), 
                    $data->__GET('areaLaboral'),
					$data->__GET('puesto'),
					
					$data->__GET('idEmpleados')
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

	public function EliminarEmpleado($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE Empleados SET idEstado = 3
			where idEmpleados= ?";
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