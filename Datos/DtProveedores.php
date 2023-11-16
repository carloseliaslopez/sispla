<?php
include_once("Connect.php");

class DtProveedores extends Conexion
{
    private $myCon;

    public function listarProveedores()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idProveedores, nombre,id,ubicacion,servicio,actividadEconomica, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso, idEstado,origen FROM proveedores WHERE idEstado<>3 ";
			//$querySQL = "SELECT idCliente, nombre,id, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') as fechaIngreso, origen FROM Clientes order by fechaIngreso desc limit 250";
            $stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Proveedores();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idProveedores', $r->idProveedores);	
				$emp->__SET('nombre', $r->nombre);	
				$emp->__SET('id', $r->id);
                $emp->__SET('ubicacion', $r->ubicacion);	
				$emp->__SET('servicio', $r->servicio);	
				$emp->__SET('actividadEconomica', $r->actividadEconomica);
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

	public function registrarProveedores(Proveedores $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO proveedores (nombre,id,ubicacion,servicio,actividadEconomica,fechaIngreso,idEstado,origen) 
		        VALUES (?,?,?,?,?, CURDATE(),1,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombre'),
			 $data->__GET('id'),
			 $data->__GET('ubicacion'),
			 $data->__GET('servicio'),
			 $data->__GET('actividadEconomica'),
			 
			 $data->__SET('origen','Proveedores')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}



	public function ExisteProveedorId($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM proveedores WHERE id = ?  AND idEstado<>3;";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$idProveedor = new Proveedores();

				//_SET(CAMPOBD, atributoEntidad)
				$idProveedor->__SET('nombre', $r->nombre);	
				$idProveedor->__SET('id', $r->id);
                $idProveedor->__SET('ubicacion', $r->ubicacion);	
				$idProveedor->__SET('servicio', $r->servicio);	
				$idProveedor->__SET('actividadEconomica', $r->actividadEconomica);
				$idProveedor->__SET('fechaIngreso', $r->fechaIngreso);
				$idProveedor->__SET('idEstado', $r->idEstado);
                $idProveedor->__SET('origen', $r->origen);

				$result[] = $idProveedor;

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
	

	public function ObtenerProveedor($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM proveedores WHERE idProveedores = ?  AND idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$idProveedor = new Proveedores();

				//_SET(CAMPOBD, atributoEntidad)
				$idProveedor->__SET('idProveedores', $r->idProveedores);
				$idProveedor->__SET('nombre', $r->nombre);	
				$idProveedor->__SET('id', $r->id);
                $idProveedor->__SET('ubicacion', $r->ubicacion);	
				$idProveedor->__SET('servicio', $r->servicio);	
				$idProveedor->__SET('actividadEconomica', $r->actividadEconomica);
				$idProveedor->__SET('fechaIngreso', $r->fechaIngreso);
				$idProveedor->__SET('idEstado', $r->idEstado);
                $idProveedor->__SET('origen', $r->origen);

				$result = $idProveedor;

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
	
	public function actualizarProveedor(Proveedores $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE proveedores SET 
			nombre = ?, 
			id = ?, 
			ubicacion = ?,
			servicio = ?,
			actividadEconomica = ?,
			idEstado = 2 
			where idProveedores= ?";
				$this->myCon->prepare($sql)
			     ->execute(
				array(
					
					$data->__GET('nombre'), 
					$data->__GET('id'),
					$data->__GET('ubicacion'), 
					$data->__GET('servicio'),
					$data->__GET('actividadEconomica'), 
					
					$data->__GET('idProveedores')
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

	public function eliminarProveedor($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE proveedores SET idEstado = 3
			where idProveedores= ?";
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