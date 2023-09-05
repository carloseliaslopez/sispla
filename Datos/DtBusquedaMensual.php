<?php
include_once("Connect.php");


class DtBusquedaMensual extends Conexion
{
    private $myCon;

	public function BusquedaMensual()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			if (!isset($_POST['FechaInicio'])){
				$_POST['FechaInicio'] = "";
				$buscar = $buscar = $_POST['FechaInicio'];
				
			}
			if (!isset($_POST['FechaFin'])){
				$_POST['FechaFin'] = "";
				$buscar2 = $buscar2 = $_POST['FechaFin'];
				
			}

			$buscar = $_POST['FechaInicio'];
			$buscar2 = $_POST['FechaFin'];

			
			$querySQL = "SELECT fechaIngreso,nombreCliente,PosibleCliente,origenC,Repreconyugue,PosibleRepresentante,origenRLC,accionistas,PosibleAccionista,origenABF
			FROM BusquedaMensual WHERE fechaIngreso
			BETWEEN '".$buscar."' AND '".$buscar2."' AND idEstado <> 3";
           
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Vw_BusquedaMensual();

				//_SET(CAMPOBD, atributoEntidad)
                $emp->__SET('fechaIngreso', $r->fechaIngreso);
				$emp->__SET('nombreCliente', $r->nombreCliente);	
				$emp->__SET('PosibleCliente', $r->PosibleCliente);	
				$emp->__SET('origenC', $r->origenC);
				$emp->__SET('Repreconyugue', $r->Repreconyugue);
				$emp->__SET('PosibleRepresentante', $r->PosibleRepresentante);
				$emp->__SET('origenRLC', $r->origenRLC);
				$emp->__SET('accionistas', $r->accionistas);
				$emp->__SET('PosibleAccionista', $r->PosibleAccionista);
				$emp->__SET('origenABF', $r->origenABF);

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