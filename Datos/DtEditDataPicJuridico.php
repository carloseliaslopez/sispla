<?php
include_once("Connect.php");

class DtEditDataPicJuridico extends Conexion
{
    private $myCon;
 
	public function editarDataPicJuridico(DatosClienteJuridicoPic $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE DatosClienteJuridicoPic SET  
                    paisConstitucion = ?,
                    fechaConstitucion= ?,
                    fechaInscripcion = ?,
                    correoPersonaContacto = ?,
                    nombrePersonaContacto = ?,
                    cargoPersonaContacto=?,
                    telefono = ?
                    WHERE idPic = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('paisConstitucion'),
			 $data->__GET('fechaConstitucion'),
			 $data->__GET('fechaInscripcion'),
			 $data->__GET('correoPersonaContacto'),
			 $data->__GET('nombrePersonaContacto'),
			 $data->__GET('cargoPersonaContacto'),
			 $data->__GET('telefono'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarDatosRL(DatosRepresentanteLegal $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE DatosRepresentanteLegal SET
            nombreRepresentanteLegal = ?,
            paisNacimiento = ?, 
            nacionalidad = ?,
            tipoIdentificacion = ?,
            numeroIdentificacion = ?,
            paisEmision = ?,
            fechaEmision = ?,
            fechaVencimiento = ?,
            paisResidencia = ?,
            celular = ?,
            correo = ?,
            cargo = ?,
            profesion = ?
            WHERE idPic  = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreRepresentanteLegal'),
			 $data->__GET('paisNacimiento'),
			 $data->__GET('nacionalidad'),
			 $data->__GET('tipoIdentificacion'),
			 $data->__GET('numeroIdentificacion'),
			 $data->__GET('paisEmision'),
			 $data->__GET('fechaEmision'),
			 $data->__GET('fechaVencimiento'),
			 $data->__GET('paisResidencia'),
			 $data->__GET('celular'),
			 $data->__GET('correo'),
			 $data->__GET('cargo'),
			 $data->__GET('profesion'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarDatosAc(Accionistas $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE Accionistas SET
                    nombreCompletoAccionistas = ?,
                    nacionalidadAccionistas = ?,
                    numIdAccionistas = ?,
                    Acciones = ?
                    WHERE idPic = ? 
                    AND idAccionistas = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreCompletoAccionistas'),
			 $data->__GET('nacionalidadAccionistas'),
			 $data->__GET('numIdAccionistas'),
			 $data->__GET('Acciones'),
			 $data->__GET('idPic'),
             $data->__GET('idAccionistas')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarDatosBf(BeneficiariosFinales $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE BeneficiariosFinales SET
                    nombreBeneFinales  = ?,
                    ApellidosBeneFinales = ?,
                    nacionalidadBeneFinales = ?,
                    numIdBeneFinales = ?,
                    AccionesBeneFinales = ? 
                    WHERE idPic = ?
                    AND idBeneficiariosFinales = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreBeneFinales'),
			 $data->__GET('ApellidosBeneFinales'),
			 $data->__GET('nacionalidadBeneFinales'),
			 $data->__GET('numIdBeneFinales'),
			 $data->__GET('AccionesBeneFinales'),
			 $data->__GET('idPic'),
             $data->__GET('idBeneficiariosFinales')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarDatosAE(ActividadEconomica $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE  ActividadEconomica SET
            nombreComercial = ?, idTributaria = ?, anios=?,
            domicilioComercial = ?, paisDomicilio = ?, departamento = ?,
            paginaWeb = ?, telefonoOficina = ?, idAreaGeografica = ?,
            idActividadNegocio = ?,descripcion=?, ventasMensual=?, 
            numEmpleados=?, numSucursales = ?, grupoEconomico=?, indicar = ?
            WHERE idPic = ?";

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
			 $data->__GET('idPic')));

			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarDatosPC(PrincipalesClientes $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE PrincipalesClientes SET
            nombreClientePic = ?,
            domicilio = ?,
            telefono = ?
            WHERE idPic = ?
            AND idPrincipalesClientes=?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreClientePic'),
			 $data->__GET('domicilio'),
			 $data->__GET('telefono'),
			 $data->__GET('idPic'),
             $data->__GET('idPrincipalesClientes'),
            ));
			


			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarDatosPP(PrincipalesProveedores $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE PrincipalesProveedores SET
            nombreProveedor = ?,
            servicio = ?,
            domicilio = ?,
            telefono = ?
            WHERE idPic = ?
            AND idPrincipalesProveedores = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreProveedor'),
			 $data->__GET('servicio'),
			 $data->__GET('domicilio'),
			 $data->__GET('telefono'),
			 $data->__GET('idPic'),
             $data->__GET('idPrincipalesProveedores')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	
    public function editarDatosInteres(InteresInfo $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE InteresInfo SET 
                idTipoPerJuridica = ?,
                idConstitucion = ?,
                idCatalogoAE = ?,
                idBusquedaRes = ?,
                idPaisAE = ?,
                idDepto = ?
                WHERE idPic = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idTipoPerJuridica'),
			 $data->__GET('idConstitucion'),
			 $data->__GET('idCatalogoAE'),
			 $data->__GET('idBusquedaRes'),
			 $data->__GET('idPaisAE'),
			 $data->__GET('idDepto'),
			 $data->__GET('idPic')));
			 
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
}