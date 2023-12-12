<?php
include_once("Connect.php");

class DtNewDataPicJurdico extends Conexion
{ 
    private $myCon;
 
	public function registrarDataPicJuridico(DatosClienteJuridicoPic $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO datosclientejuridicopic (paisConstitucion, deptoConstitucion, fechaConstitucion,fechaInscripcion,correoPersonaContacto,nombrePersonaContacto,cargoPersonaContacto,telefono,idPic,usuario_creacion,fecha_creacion) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('paisConstitucion'),
			 $data->__GET('deptoConstitucion'),
			 $data->__GET('fechaConstitucion'),
			 $data->__GET('fechaInscripcion'),
			 $data->__GET('correoPersonaContacto'),
			 $data->__GET('nombrePersonaContacto'),
			 $data->__GET('cargoPersonaContacto'),
			 $data->__GET('telefono'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosRL(DatosRepresentanteLegal $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO datosrepresentantelegal (nombreRepresentanteLegal,paisNacimiento,deptoPaisNacimiento,nacionalidad,tipoIdentificacion, numeroIdentificacion,paisEmision,fechaEmision,fechaVencimiento,paisResidencia,deptoPaisResidencia,celular,correo,cargo,profesion,idPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreRepresentanteLegal'),
			 $data->__GET('paisNacimiento'),
			 $data->__GET('deptoPaisNacimiento'),
			 $data->__GET('nacionalidad'),
			 //$data->__GET('deptoNacionalidad'),
			 $data->__GET('tipoIdentificacion'),
			 $data->__GET('numeroIdentificacion'),
			 $data->__GET('paisEmision'),
			 $data->__GET('fechaEmision'),
			 $data->__GET('fechaVencimiento'),
			 $data->__GET('paisResidencia'),
			 $data->__GET('deptoPaisResidencia'),
			 $data->__GET('celular'),
			 $data->__GET('correo'),
			 $data->__GET('cargo'),
			 $data->__GET('profesion'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')
			));

			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosAc(Accionistas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO accionistas(nombreCompletoAccionistas,nacionalidadAccionistas, numIdAccionistas,Acciones,idPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreCompletoAccionistas'),
			 $data->__GET('nacionalidadAccionistas'),
			 //$data->__GET('deptoNacionalidadAccionistas'),
			 $data->__GET('numIdAccionistas'),
			 $data->__GET('Acciones'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosBf(BeneficiariosFinales $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO beneficiariosfinales (nombreBeneFinales,ApellidosBeneFinales,nacionalidadBeneFinales,numIdBeneFinales,AccionesBeneFinales,idPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreBeneFinales'),
			 $data->__GET('ApellidosBeneFinales'),
			 $data->__GET('nacionalidadBeneFinales'),
			 //$data->__GET('deptoNacionalidadBeneFinales'),
			 $data->__GET('numIdBeneFinales'),
			 $data->__GET('AccionesBeneFinales'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosDG(Apoderados $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO apoderados (nombreCompletoApoderados, numIdApoderados, cargo, idPic, usuario_creacion, fecha_creacion)
		        	VALUES (?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreCompletoApoderados'),
			 $data->__GET('numIdApoderados'),
			 $data->__GET('cargo'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosAE(ActividadEconomica $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO actividadeconomica (nombreComercial,idTributaria,anios,domicilioComercial,paisDomicilio,departamento,paginaWeb,telefonoOficina,idAreaGeografica,idActividadNegocio,descripcion,ventasMensual,numEmpleados,numSucursales,grupoEconomico,indicar,idPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreComercial'),
			 $data->__GET('idTributaria'),
			 $data->__GET('anios'),
			 $data->__GET('domicilioComercial'),
			 $data->__GET('paisDomicilio'),
			 $data->__GET('departamento'),
			 $data->__GET('paginaWeb'),
			 $data->__GET('telefonoOficina'),
			 $data->__GET('idAreaGeografica'),
			 $data->__GET('idActividadNegocio'),
			 $data->__GET('descripcion'),
			 $data->__GET('ventasMensual'),
			 $data->__GET('numEmpleados'),
			 $data->__GET('numSucursales'),
			 $data->__GET('grupoEconomico'),
			 $data->__GET('indicar'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));

			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosPC(PrincipalesClientes $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO principalesclientes (nombreClientePic,domicilio,telefono,idPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreClientePic'),
			 $data->__GET('domicilio'),
			 $data->__GET('telefono'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			


			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosPP(PrincipalesProveedores $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO principalesproveedores (nombreProveedor,servicio,domicilio,telefono,IdPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreProveedor'),
			 $data->__GET('servicio'),
			 $data->__GET('domicilio'),
			 $data->__GET('telefono'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDatosInteres(InteresInfo $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO interesinfo(idTipoPerJuridica,idConstitucion,idCatalogoAE,idBusquedaRes,idPaisAE,idDepto,idPic,usuario_creacion,fecha_creacion)
					VALUES(?,?,?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idTipoPerJuridica'),
			 $data->__GET('idConstitucion'),
			 $data->__GET('idCatalogoAE'),
			 $data->__GET('idBusquedaRes'),
			 $data->__GET('idPaisAE'),
			 $data->__GET('idDepto'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			 
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
}