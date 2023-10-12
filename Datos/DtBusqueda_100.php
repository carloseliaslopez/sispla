<?php
include_once("Connect.php");


class DtBusqueda_100 extends Conexion
{
    private $myCon;

	public function listarBusqueda_100()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
					
			$querySQL = "SELECT nombre, id, relacion, origen FROM Lista_Coincidencia;";
           
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Busqueda_100();

				//_SET(CAMPOBD, atributoEntidad)
                $emp->__SET('nombre', $r->nombre);
				$emp->__SET('id', $r->id);	
				$emp->__SET('relacion', $r->relacion);	
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

	public function listarBusqueda_80()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
					
			$querySQL = "SELECT idPosibles_List, Nombre, Id, Origen, Nombre2, Origen2, idEstado, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion FROM Posibles_List WHERE idEstado<>3";
           
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $s)
			{
				$emp = new Busqueda_80();

				//_SET(CAMPOBD, atributoEntidad)
               	$emp->__SET('idPosibles_List', $s->idPosibles_List);
				$emp->__SET('Nombre', $s->Nombre);
				$emp->__SET('Id', $s->Id);
				$emp->__SET('Origen', $s->Origen);
				$emp->__SET('Nombre2', $s->Nombre2);
				$emp->__SET('Origen2', $s->Origen2);
				$emp->__SET('idEstado', $s->idEstado);
				$emp->__SET('usuario_creacion', $s->usuario_creacion);
				$emp->__SET('fecha_creacion', $s->fecha_creacion);
				$emp->__SET('usuario_modificacion', $s->usuario_modificacion);
				$emp->__SET('fecha_modificacion', $s->fecha_modificacion);
				$emp->__SET('usuario_eliminacion', $s->usuario_eliminacion);
				$emp->__SET('fecha_eliminacion', $s->fecha_eliminacion);
					
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

	public function EliminarRegistro_80($id, $s)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE Posibles_List 
			SET idEstado = 3,
			usuario_eliminacion = ?,
			fecha_eliminacion = current_timestamp()
			WHERE idPosibles_List = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id,$s));
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


		
}