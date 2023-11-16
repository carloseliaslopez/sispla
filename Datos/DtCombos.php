<?php
include_once("Connect.php");

class DtCombos extends Conexion
{
    private $myCon;

    
	public function ComboPais()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idPais, nombrePais FROM pais WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboPais();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idPais', $r->idPais);
				$emp->__SET('nombrePais', $r->nombrePais);
				
				
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

	public function ComboFormaPago()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idFormaPago, nombreFormaPago FROM formapago WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboFormaPago();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idFormaPago', $r->idFormaPago);
				$emp->__SET('nombreFormaPago', $r->nombreFormaPago);
				
				
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


	public function ComboOrigenesFondos()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idFuenteFondos, nombreFuenteFondos FROM fuentefondos WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboOrigenesFondos();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idFuenteFondos', $r->idFuenteFondos);
				$emp->__SET('nombreFuenteFondos', $r->nombreFuenteFondos);
				
				
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

	public function ComboEstadoCivil()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idEstadoCivil, descripcion FROM estadocivil WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboEstadoCivil();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idEstadoCivil', $r->idEstadoCivil);
				$emp->__SET('descripcion', $r->descripcion);
				
				
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

	public function ComboAreaGeografica()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idAreaGeografica,nombreAreaGeografica FROM areageografica WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboAreaGeografica();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idAreaGeografica', $r->idAreaGeografica);
				$emp->__SET('nombreAreaGeografica', $r->nombreAreaGeografica);
				
				
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


	public function ComboActividadNegocio()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idActividadNegocio,nombreActividadNegocio FROM actividadnegocio WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboActividadNegocio();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idActividadNegocio', $r->idActividadNegocio);
				$emp->__SET('nombreActividadNegocio', $r->nombreActividadNegocio);
				
				
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

	public function ComboRelacionCliente()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idRelacionCliente, descripcion, idEstado FROM relacioncliente WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new RelacionCliente();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idRelacionCliente', $r->idRelacionCliente);
				$emp->__SET('descripcion', $r->descripcion);
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

	public function ComboCausaFacta()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCausa, descripcion, idEstado FROM causa WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Causa();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idCausa', $r->idCausa);
				$emp->__SET('descripcion', $r->descripcion);
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



	//COMBOS PARA LA MATRIZ DE EVALUACION GENERAL
	
	public function ComboSubProducto()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCatalogoSubProducto, nombreSubProducto,idCategoriaProducto,riesgoSubProducto,idEstado FROM vw_catalogosubproducto";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoSubProducto();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idCatalogoSubProducto', $r->idCatalogoSubProducto);
				$emp->__SET('nombreSubProducto', $r->nombreSubProducto);
				$emp->__SET('idCategoriaProducto', $r->idCategoriaProducto);
				$emp->__SET('riesgoSubProducto', $r->riesgoSubProducto);
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


	//COMBOS PARA LOS DEPARTAMENTOS 

	//PANAMA
	public function ComboDepto()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idDepartamento, nombreDepartamento, calificacion, idEstado, idPais FROM departamento WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

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

	public function ComboPais_CA()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idPais, nombrePais FROM pais WHERE idEstado<>3 AND idPais BETWEEN 1 AND 6  ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ComboPais();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idPais', $r->idPais);
				$emp->__SET('nombrePais', $r->nombrePais);
				
				
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

	//ANEXOS DEL PIC 
	public function Combo_PJuridica()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idTipoPerJuridica, tipoPersona,calificacion,idEstado FROM tipoperjuridica WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new TipoPerJuridica();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idTipoPerJuridica', $r->idTipoPerJuridica);
				$emp->__SET('tipoPersona', $r->tipoPersona);
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
	
	public function Combo_Constitucion()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idConstitucion, fechaConstitucion,calificacion,idEstado FROM constitucion WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Constitucion();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idConstitucion', $r->idConstitucion);
				$emp->__SET('fechaConstitucion', $r->fechaConstitucion);
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

	public function Combo_CatSalario()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCategoriaSalario, categoria,calificacion,idEstado FROM categoriasalario WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CategoriaSalario();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idCategoriaSalario', $r->idCategoriaSalario);
				$emp->__SET('categoria', $r->categoria);
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

	public function Combo_ResBusqueda()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idBusquedaRes, busqueda, calificacion, idEstado FROM busquedares WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new BusquedaRes();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idBusquedaRes', $r->idBusquedaRes);
				$emp->__SET('busqueda', $r->busqueda);
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

	public function ComboOrganismo()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idOrganismo, nombreOrganismo FROM organismo WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Organismo();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idOrganismo', $r->idOrganismo);
				$emp->__SET('nombreOrganismo', $r->nombreOrganismo);
						
				
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

	public function ComboCatOcupacional()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCategoriaOcupacional, tipoCategoria, calificacion, idEstado FROM categoriaocupacional WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CategoriaOcupacional();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idCategoriaOcupacional', $r->idCategoriaOcupacional);
				$emp->__SET('tipoCategoria', $r->tipoCategoria);
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

	//funcion para completar la categoria de cliete la empresa;

	public function ComboCatEmpresa()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idEmpresa, razonSocial, idPaisOrigen, idEstado, usuario_creacion, fecha_creacion, usuario_modificacion, fecha_modificacion, usuario_eliminacion, fecha_eliminacion FROM empresa WHERE idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Empresa();

				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idEmpresa', $r->idEmpresa);
				$emp->__SET('razonSocial', $r->razonSocial);
				$emp->__SET('idPaisOrigen', $r->idPaisOrigen);
				$emp->__SET('idEstado', $r->idEstado);
				$emp->__SET('usuario_creacion', $r->usuario_creacion);
				$emp->__SET('fecha_creacion', $r->fecha_creacion);
				$emp->__SET('usuario_modificacion', $r->usuario_modificacion);
				$emp->__SET('usuario_eliminacion', $r->usuario_eliminacion);
				$emp->__SET('fecha_eliminacion', $r->fecha_eliminacion);
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