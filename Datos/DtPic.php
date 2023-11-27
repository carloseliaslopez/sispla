<?php
include_once("Connect.php");

class DtPic extends Conexion
{
    private $myCon;

	//OBTENER DATOS JURIDICOS

    public function listarPic()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idPic, DATE_FORMAT(fechaPic, '%d/%m/%Y') AS fechaPic, nombreCliente, id, origen,categoria, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso, idEstado  FROM pic WHERE idEstado<>3 ";
			
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Pic();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idPic', $r->idPic);	
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

  
	public function ObtenerPic($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idpic, DATE_FORMAT(fechaPic, '%d/%m/%Y') as fechaPic, nombreCliente, id, origen,categoria, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso, idEstado FROM pic WHERE idpic = ?  AND idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

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

				$result = $emp;

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

	public function registrarPic(Pic $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO pic (fechaPic,nombreCliente,id,origen,categoria,fechaIngreso,usuario_creacion,fecha_creacion,idEmpresa,idEstado) 
		        VALUES (?,?,?,'Clientes',?,CURDATE(),?,current_timestamp(),?,?)";

			$this->myCon->prepare($sql)
			->execute(array(
			$data->__GET('fechaPic'),
			$data->__GET('nombreCliente'),
			$data->__GET('id'),
			
			$data->__GET('categoria'),
			
			$data->__GET('usuario_creacion'),
			
			$data->__GET('idEmpresa'),
			$data->__SET('idEstado',1)));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ExistePic($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idpic, DATE_FORMAT(fechaPic, '%d/%m/%Y') as fechaPic, nombreCliente, id, origen,categoria, DATE_FORMAT(fechaIngreso, '%d/%m/%Y') AS fechaIngreso, idEstado FROM pic WHERE id = ?  AND idEstado<>3";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

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

				$result = $emp;

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


	
	public function Obtenerdatos($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_datosgenerales  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_DatosGenerales();

				$emp->__SET('paisConstitucion', $r->paisConstitucion);	
				$emp->__SET('nombre_paisConstitucion', $r->nombre_paisConstitucion);
				$emp->__SET('deptoConstitucion', $r->deptoConstitucion);	
				$emp->__SET('nombreDepartamento', $r->nombreDepartamento);
				$emp->__SET('fechaConstitucion', $r->fechaConstitucion);	
				$emp->__SET('fechaInscripcion', $r->fechaInscripcion);
				$emp->__SET('correoPersonaContacto', $r->correoPersonaContacto);
				$emp->__SET('nombrePersonaContacto', $r->nombrePersonaContacto);
                $emp->__SET('cargoPersonaContacto', $r->cargoPersonaContacto);
                $emp->__SET('telefono', $r->telefono);

				$result = $emp;

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
	

	public function DatosRL($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_datosrl  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_datosRL();

				$emp->__SET('idPic', $r->idPic);	
				$emp->__SET('nombreRepresentanteLegal', $r->nombreRepresentanteLegal);	
				$emp->__SET('paisNacimiento', $r->paisNacimiento);	
				$emp->__SET('nombre_paisNacimiento', $r->nombre_paisNacimiento);	
				$emp->__SET('deptoPaisNacimiento', $r->deptoPaisNacimiento);	
				$emp->__SET('nombre_deptoPaisNacimiento', $r->nombre_deptoPaisNacimiento);	
				$emp->__SET('nacionalidad', $r->nacionalidad);	
				$emp->__SET('nombre_nacionalidad', $r->nombre_nacionalidad);	
				//$emp->__SET('deptoNacionalidad', $r->deptoNacionalidad);	
				//$emp->__SET('nombre_deptoNacionalidad', $r->nombre_deptoNacionalidad);	
				$emp->__SET('tipoIdentificacion', $r->tipoIdentificacion);	
				$emp->__SET('numeroIdentificacion', $r->numeroIdentificacion);	
				$emp->__SET('paisEmision', $r->paisEmision);	
				$emp->__SET('nombre_paisEmision', $r->nombre_paisEmision);	
				$emp->__SET('fechaEmision', $r->fechaEmision);	
				$emp->__SET('fechaVencimiento', $r->fechaVencimiento);	
				$emp->__SET('paisResidencia', $r->paisResidencia);	
				$emp->__SET('nombre_paisResidencia', $r->nombre_paisResidencia);	
				$emp->__SET('deptoPaisResidencia', $r->deptoPaisResidencia);
				$emp->__SET('nombre_deptoPaisResidencia', $r->nombre_deptoPaisResidencia);	
				$emp->__SET('celular', $r->celular);
				$emp->__SET('correo', $r->correo);
				$emp->__SET('cargo', $r->cargo);
				$emp->__SET('profesion', $r->profesion);

				$result = $emp;

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

	public function DatosAccionistas($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_accionistas  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_Accionistas();

				$emp->__SET('idPic', $r->idPic);	
				$emp->__SET('nombreCompletoAccionistas', $r->nombreCompletoAccionistas);
				$emp->__SET('nacionalidadAccionistas', $r->nacionalidadAccionistas);
				$emp->__SET('nombre_nacionalidadAccionistas', $r->nombre_nacionalidadAccionistas);
				//$emp->__SET('deptoNacionalidadAccionistas', $r->deptoNacionalidadAccionistas);
				//$emp->__SET('nombre_deptoNacionalidadAccionistas', $r->nombre_deptoNacionalidadAccionistas);
				$emp->__SET('numIdAccionistas', $r->numIdAccionistas);
				$emp->__SET('acciones', $r->acciones);
			
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

	public function DatosBeneFinales($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_benefinales  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_BeneficiariosFinales();
				$emp->__SET('idBeneficiariosFinales', $r->idBeneficiariosFinales);	
				$emp->__SET('nombreBeneFinales', $r->nombreBeneFinales);	
				$emp->__SET('ApellidosBeneFinales', $r->ApellidosBeneFinales);
				$emp->__SET('nacionalidadBeneFinales', $r->nacionalidadBeneFinales);
				$emp->__SET('nombre_nacionalidadBeneFinales', $r->nombre_nacionalidadBeneFinales);
				//$emp->__SET('deptoNacionalidadBeneFinales', $r->deptoNacionalidadBeneFinales);
				//$emp->__SET('nombre_deptoNacionalidadBeneFinales', $r->nombre_deptoNacionalidadBeneFinales);
				$emp->__SET('numIdBeneFinales', $r->numIdBeneFinales);
				$emp->__SET('AccionesBeneFinales', $r->AccionesBeneFinales);
				$emp->__SET('idPic', $r->idPic);
		
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

	public function ActividadEconomica($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_actividadeconomica  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ActividadEconomica();

				$emp->__SET('nombreComercial', $r->nombreComercial);	
				$emp->__SET('idTributaria', $r->idTributaria);
				$emp->__SET('anios', $r->anios);
				$emp->__SET('domicilioComercial', $r->domicilioComercial);
				$emp->__SET('paisDomicilio', $r->paisDomicilio);
				$emp->__SET('nombre_paisDomicilio', $r->nombre_paisDomicilio);
				$emp->__SET('departamento', $r->departamento);
				$emp->__SET('nombre_departamento', $r->nombre_departamento);
				$emp->__SET('paginaWeb', $r->paginaWeb);
				$emp->__SET('telefonoOficina', $r->telefonoOficina);
				$emp->__SET('idAreaGeografica', $r->idAreaGeografica);
				$emp->__SET('nombre_idAreaGeografica', $r->nombre_idAreaGeografica);
				$emp->__SET('idActividadNegocio', $r->idActividadNegocio);
				$emp->__SET('nombre_idActividadNegocio', $r->nombre_idActividadNegocio);
				$emp->__SET('descripcion', $r->descripcion);
				$emp->__SET('ventasMensual', $r->ventasMensual);
				$emp->__SET('numEmpleados', $r->numEmpleados);
				$emp->__SET('numSucursales', $r->numSucursales);
				$emp->__SET('grupoEconomico', $r->grupoEconomico);
				$emp->__SET('indicar', $r->indicar);

				$result = $emp;

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

	public function DatosPClientes($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_principalesclientes  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new PrincipalesClientes();
				$emp->__SET('idPrincipalesClientes', $r->idPrincipalesClientes);
				$emp->__SET('nombreClientePic', $r->nombreClientePic);	
				$emp->__SET('domicilio', $r->domicilio);
				$emp->__SET('telefono', $r->telefono);
				
			
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

	public function DatosPProveedores($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_principalesproveedores  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new PrincipalesProveedores();

				$emp->__SET('nombreProveedor', $r->nombreProveedor);	
				$emp->__SET('servicio', $r->servicio);
				$emp->__SET('domicilio', $r->domicilio);
				$emp->__SET('telefono', $r->telefono);
	
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





	public function EliminarPic($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "UPDATE pic SET idEstado = 3
			WHERE idPic = ?";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function DatosInteres($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idInteresInfo,idTipoPerJuridica, tipoPersona, idConstitucion, fechaConstitucion, 
			idCatalogoAE, descripcion, idBusquedaRes, busqueda, idPaisAE, nombrePais, idDepto, 
			nombreDepartamento, idPic 
			FROM vw_interesinfo WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_InteresInfo();

				$emp->__SET('idInteresInfo', $r->idInteresInfo);	
				$emp->__SET('idTipoPerJuridica', $r->idTipoPerJuridica);
				$emp->__SET('tipoPersona', $r->tipoPersona);	
				$emp->__SET('idConstitucion', $r->idConstitucion);
				$emp->__SET('fechaConstitucion', $r->fechaConstitucion);	
				$emp->__SET('idCatalogoAE', $r->idCatalogoAE);
				$emp->__SET('descripcion', $r->descripcion);	
				$emp->__SET('idBusquedaRes', $r->idBusquedaRes);
				$emp->__SET('busqueda', $r->busqueda);	
				$emp->__SET('idPaisAE', $r->idPaisAE);
				$emp->__SET('nombrePais', $r->nombrePais);	
				$emp->__SET('idDepto', $r->idDepto);
				$emp->__SET('nombreDepartamento', $r->nombreDepartamento);
				$emp->__SET('idPic', $r->idPic);

				$result = $emp;

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


	//OBTENER LOS DATOS DE PIC NATURAL

	public function DatosClienteNaturalPic($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_datosclientenaturalpic  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_DatosClienteNaturalPic();

				$emp->__SET('idDatosClienteNaturalPic', $r->idDatosClienteNaturalPic);
				$emp->__SET('fechaNacimiento', $r->fechaNacimiento);
				$emp->__SET('paisNacimiento', $r->paisNacimiento);
				$emp->__SET('nombre_paisNacimiento', $r->nombre_paisNacimiento);
				$emp->__SET('deptoPaisNacimiento', $r->deptoPaisNacimiento);
				$emp->__SET('nombre_deptoPaisNacimiento', $r->nombre_deptoPaisNacimiento);
				$emp->__SET('nacionalidad', $r->nacionalidad);
				$emp->__SET('nombre_nacionalidad', $r->nombre_nacionalidad);
				$emp->__SET('deptoNacionalidad', $r->deptoNacionalidad);
				$emp->__SET('nombre_deptoNacionalidad', $r->nombre_deptoNacionalidad);
				$emp->__SET('idEstadoCivil', $r->idEstadoCivil);
				$emp->__SET('nombre_idEstadoCivil', $r->nombre_idEstadoCivil);
				$emp->__SET('sexo', $r->sexo);
				$emp->__SET('ndependientes', $r->ndependientes);
				$emp->__SET('tipoIdentificacion', $r->tipoIdentificacion);
				$emp->__SET('numIdentificacion', $r->numIdentificacion);
				$emp->__SET('paisEmision', $r->paisEmision);
				$emp->__SET('nombre_paisEmision', $r->nombre_paisEmision);
				$emp->__SET('fechaEmision', $r->fechaEmision);
				$emp->__SET('fechaVencimiento', $r->fechaVencimiento);
				$emp->__SET('direccionDomicilio', $r->direccionDomicilio);
				$emp->__SET('PaisDomicilio', $r->PaisDomicilio);
				$emp->__SET('nombre_PaisDomicilio', $r->nombre_PaisDomicilio);
				$emp->__SET('deptoPaisDomicilio', $r->deptoPaisDomicilio);
				$emp->__SET('nombre_deptoPaisDomicilio', $r->nombre_deptoPaisDomicilio);
				$emp->__SET('celular', $r->celular);
				$emp->__SET('telefono', $r->telefono);
				$emp->__SET('correoPersonaNatural', $r->correoPersonaNatural);
				$emp->__SET('profesion', $r->profesion);
				$emp->__SET('idPic', $r->idPic);

				$result = $emp;

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


	public function DatosLaborales($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_datoslaborales  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new DatosLaborales();

				$emp->__SET('idPic', $r->idPic);	
				$emp->__SET('nombreEmpresa', $r->nombreEmpresa);
				$emp->__SET('cargoEmpresa', $r->cargoEmpresa);	
				$emp->__SET('fechaIngreso', $r->fechaIngreso);
				$emp->__SET('antiguedad', $r->antiguedad);
				$emp->__SET('direccionEmpresa', $r->direccionEmpresa);
				$emp->__SET('paisEmpresa', $r->paisEmpresa);
				$emp->__SET('nombre_paisEmpresa', $r->nombre_paisEmpresa);
				$emp->__SET('telefono', $r->telefono);
				$emp->__SET('salarioMensual', $r->salarioMensual);
				$emp->__SET('otrosIngresos', $r->otrosIngresos);
				$emp->__SET('egresosMensuales', $r->egresosMensuales);
				$emp->__SET('fuenteOtrosIngresos', $r->fuenteOtrosIngresos);

				$result = $emp;

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

	public function DatosConyuge($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_datosconyuge  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new DatosConyuge();

				$emp->__SET('idPic', $r->idPic);	
				$emp->__SET('nombreConyugue', $r->nombreConyugue);
				$emp->__SET('fechaNacimiento', $r->fechaNacimiento);	
				$emp->__SET('paisNacimientoConyuge', $r->paisNacimientoConyuge);
				$emp->__SET('nombre_paisNacimientoConyuge', $r->nombre_paisNacimientoConyuge);
				$emp->__SET('nacionalidadConyuge', $r->nacionalidadConyuge);
				$emp->__SET('nombre_nacionalidadConyuge', $r->nombre_nacionalidadConyuge);
				$emp->__SET('numeroIdentificacion', $r->numeroIdentificacion);
				$emp->__SET('tipoIdentificacion', $r->tipoIdentificacion);
				$emp->__SET('paisEmision', $r->paisEmision);
				$emp->__SET('nombre_paisEmision', $r->nombre_paisEmision);
				$emp->__SET('profesion', $r->profesion);
				$emp->__SET('celular', $r->celular);
				$emp->__SET('empresaLabora', $r->empresaLabora);
				$emp->__SET('telefono', $r->telefono);
				$emp->__SET('cargoEmpresa', $r->cargoEmpresa);
				$emp->__SET('ingresoMensual', $r->ingresoMensual);

				$result = $emp;

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

	public function Fiador($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_fiador  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Fiador();

				$emp->__SET('idPic', $r->idPic);
				$emp->__SET('nombreFiador', $r->nombreFiador);	
				$emp->__SET('RelacionDeudor', $r->RelacionDeudor);	
				$emp->__SET('nacionalidad', $r->nacionalidad);	
				$emp->__SET('nombre_nacionalidad', $r->nombre_nacionalidad);	
				$emp->__SET('tipoIdentificacionFiador', $r->tipoIdentificacionFiador);	
				$emp->__SET('numIdFiador', $r->numIdFiador);	
				$emp->__SET('paisEmision', $r->paisEmision);	
				$emp->__SET('nombre_paisEmision', $r->nombre_paisEmision);
				$emp->__SET('correoFiador', $r->correoFiador);	
				$emp->__SET('celularFiador', $r->celularFiador);	
				$emp->__SET('direccionFiador', $r->direccionFiador);	
				$emp->__SET('paisDomicilioFiador', $r->paisDomicilioFiador);
				$emp->__SET('nombre_paisDomicilioFiador', $r->nombre_paisDomicilioFiador);	
				$emp->__SET('telefonoFiador', $r->telefonoFiador);	
				$emp->__SET('EmpresaFiador', $r->EmpresaFiador);	
				$emp->__SET('telefonoEmpresa', $r->telefonoEmpresa);
				$emp->__SET('cargoFiador', $r->cargoFiador);	
				$emp->__SET('ingresoMensualFiador', $r->ingresoMensualFiador);
				
				$result = $emp;

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

	public function Referencias($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM referencias  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Referencias();

				$emp->__SET('idReferencias', $r->idReferencias);
				$emp->__SET('nombreReferencia', $r->nombreReferencia);
				$emp->__SET('tipoIdentificacion', $r->tipoIdentificacion);
				$emp->__SET('numeroIdentificacion', $r->numeroIdentificacion);
				$emp->__SET('tiempoReferido', $r->tiempoReferido);
				$emp->__SET('celular', $r->celular);
				$emp->__SET('telefono', $r->telefono);
				$emp->__SET('LugarLabora', $r->LugarLabora);
				$emp->__SET('idPic', $r->idPic);
		
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

	public function DatosInteresPN($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idInteresInfoPN, idCategoriaOcupacional, tipoCategoria, riesgo_CatOcup, idCatalogoOCGO, codigoCGO,
						descripcionCGO, riesgoCGO, idCatalogo_Acti_Economica, codigoCIIU, descripcion, riesgo_AC, idPaisACII,
						nombrePais, riesgo_Pais, idDeptoACII, nombreDepartamento, riesgo_Depto, idBusquedaRes, busqueda, 
						riesgo_Busqueda,idPic
			 FROM vw_interesinfopn  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_InteresInfoPN();

				$emp->__SET('idInteresInfoPN', $r->idInteresInfoPN);
				$emp->__SET('idCategoriaOcupacional', $r->idCategoriaOcupacional);
				$emp->__SET('tipoCategoria', $r->tipoCategoria);
				$emp->__SET('riesgo_CatOcup', $r->riesgo_CatOcup);
				$emp->__SET('idCatalogoOCGO', $r->idCatalogoOCGO);
				$emp->__SET('codigoCGO', $r->codigoCGO);
				$emp->__SET('descripcionCGO', $r->descripcionCGO);
				$emp->__SET('riesgoCGO', $r->riesgoCGO);
				$emp->__SET('idCatalogo_Acti_Economica', $r->idCatalogo_Acti_Economica);
				$emp->__SET('codigoCIIU', $r->codigoCIIU);
				$emp->__SET('descripcion', $r->descripcion);
				$emp->__SET('riesgo_AC', $r->riesgo_AC);
				$emp->__SET('idPaisACII', $r->idPaisACII);
				$emp->__SET('nombrePais', $r->nombrePais);
				$emp->__SET('riesgo_Pais', $r->riesgo_Pais);
				$emp->__SET('idDeptoACII', $r->idDeptoACII);
				$emp->__SET('nombreDepartamento', $r->nombreDepartamento);
				$emp->__SET('riesgo_Depto', $r->riesgo_Depto);
				$emp->__SET('idBusquedaRes', $r->idBusquedaRes);
				$emp->__SET('busqueda', $r->busqueda);
				$emp->__SET('riesgo_Busqueda', $r->riesgo_Busqueda);
				$emp->__SET('idPic', $r->idPic);
		
				$result = $emp;
				
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