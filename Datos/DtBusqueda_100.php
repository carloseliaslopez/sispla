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
					
			$querySQL = "SELECT nombre, id, origen FROM vw_consol_nombre";
           
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $s)
			{
				$emp = new vw_consol_nombre();

				//_SET(CAMPOBD, atributoEntidad)
               	$emp->__SET('nombre', $s->nombre);
				$emp->__SET('id', $s->id);	
				$emp->__SET('origen', $s->origen);	

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


	public function obtenerListaBusqueda_80($ref)
	{
				
		try 
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "call global_risk_lists.Busqueda_coincidencia(?);";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($ref));
			
			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
				{
					$emp = new Posibles();			
					//$Result = $emp->__SET('concidencia', $r->concidencia);
						$emp->__SET('fullname', $r->fullname);
						$emp->__SET('origen', $r->origen);
					
					
					$result[] = $emp;
				}
			$this->myCon = parent::desconectar();
			return $result;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
		
}