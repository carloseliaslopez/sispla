<?php
include_once("Connect.php");

class DtMatrizRiesgoCompartida extends Conexion
{
    private $myCon;

    public function listarPicNatural()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idpic, fechaPic, nombreCliente, id, origen,categoria, fechaIngreso, idEstado  FROM pic where idEstado<>3 and categoria = 'Natural' order by fechaIngreso DESC";
			
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Pic();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idpic', $r->idpic);	
				$emp->__SET('fechaPic', $r->fechaPic);	
				$emp->__SET('nombreCliente', $r->nombreCliente);
				$emp->__SET('id', $r->id);
				$emp->__SET('origen', $r->origen);
                $emp->__SET('categoria', $r->categoria);
                $emp->__SET('fechaIngreso', $r->fechaIngreso);
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

	public function listarCategoriaProducto()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCategoriaProducto,nombreCategoriaProducto,idEstado  FROM categoriaproducto where idEstado<>3";
			
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CategoriaProducto();

				//_SET(CAMPOBD, atributoEntidad)
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

	public function listarMonto()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idMonto, descripcion, calificacion, idEstado  FROM monto where idEstado<>3";
			
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Monto();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idMonto', $r->idMonto);
				$emp->__SET('descripcion', $r->descripcion);	
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


	//TRABAJANDO EL PIC JURIDICO
	public function listarPicJuridico()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idpic, fechaPic, nombreCliente, id, origen,categoria, fechaIngreso, idEstado  FROM pic WHERE idEstado<>3 AND categoria = 'Jurídico' ORDER BY fechaIngreso DESC";
			
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Pic();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idpic', $r->idpic);	
				$emp->__SET('fechaPic', $r->fechaPic);	
				$emp->__SET('nombreCliente', $r->nombreCliente);
				$emp->__SET('id', $r->id);
				$emp->__SET('origen', $r->origen);
                $emp->__SET('categoria', $r->categoria);
                $emp->__SET('fechaIngreso', $r->fechaIngreso);
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

	public function obtenerCliente($id,$prod)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_informeidd WHERE idCliente = ? AND productoSolicitado = ? ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id,$prod));
			
				$r = $stm->fetch(PDO::FETCH_OBJ);

				$emp = new vw_informeIDD();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idCliente', $r->idCliente);	
				$emp->__SET('cliente', $r->cliente);	
				$emp->__SET('tipoCliente', $r->tipoCliente);
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('paisMatriz', $r->paisMatriz);
				$emp->__SET('riesgoCliente', $r->riesgoCliente);
				$emp->__SET('fechaRealizacion', $r->fechaRealizacion);
							
			$this->myCon = parent::desconectar();
			return $emp;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
}