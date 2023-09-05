<?php
include_once("Connect.php");

class DtNewDataPicNatural extends Conexion
{
    private $myCon;
 
	public function registrarDataPicNatural(DatosClienteNaturalPic $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO DatosClienteNaturalPic (fechaNacimiento,paisNacimiento,deptoPaisNacimiento,nacionalidad,deptoNacionalidad,idEstadoCivil,sexo
            ,ndependientes,tipoIdentificacion,numIdentificacion,paisEmision,fechaEmision,fechaVencimiento
            ,direccionDomicilio,PaisDomicilio,deptoPaisDomicilio,telefono,celular,correoPersonaNatural,profesion,idPic)
            VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('fechaNacimiento'),
			 $data->__GET('paisNacimiento'),
			 $data->__GET('deptoPaisNacimiento'),
			 $data->__GET('nacionalidad'),
			 $data->__GET('deptoNacionalidad'),
			 $data->__GET('idEstadoCivil'),
			 $data->__GET('sexo'),
			 $data->__GET('ndependientes'),
			 $data->__GET('tipoIdentificacion'),
             $data->__GET('numIdentificacion'),
             $data->__GET('paisEmision'),
             $data->__GET('fechaEmision'),
             $data->__GET('fechaVencimiento'),
             $data->__GET('direccionDomicilio'),
             $data->__GET('PaisDomicilio'),
             $data->__GET('deptoPaisDomicilio'),
             $data->__GET('telefono'),
             $data->__GET('celular'),
             $data->__GET('correoPersonaNatural'),
             $data->__GET('profesion'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function registrarDatosLaborales (DatosLaborales $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO DatosLaborales (nombreEmpresa,cargoEmpresa,fechaIngreso,antiguedad,direccionEmpresa,paisEmpresa,telefono,salarioMensual,otrosIngresos,egresosMensuales,fuenteOtrosIngresos,idPic)
		        	VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreEmpresa'),
             $data->__GET('cargoEmpresa'),
             $data->__GET('fechaIngreso'),
             $data->__GET('antiguedad'),
             $data->__GET('direccionEmpresa'),
             $data->__GET('paisEmpresa'),
             $data->__GET('telefono'),
             $data->__GET('salarioMensual'),
             $data->__GET('otrosIngresos'),
             $data->__GET('egresosMensuales'),
             $data->__GET('fuenteOtrosIngresos'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

    public function registrarDatosConyuge (DatosConyuge $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO DatosConyuge (nombreConyugue,fechaNacimiento,paisNacimientoConyuge,nacionalidadConyuge,tipoIdentificacion,numeroIdentificacion
                    ,paisEmision,profesion,celular,empresaLabora,telefono,cargoEmpresa,ingresoMensual,idPic)
		        	VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreConyugue'),
             $data->__GET('fechaNacimiento'),
             $data->__GET('paisNacimientoConyuge'),
             $data->__GET('nacionalidadConyuge'),
             $data->__GET('tipoIdentificacion'),
             $data->__GET('numeroIdentificacion'),
             $data->__GET('paisEmision'),
             $data->__GET('profesion'),
             $data->__GET('celular'),
             $data->__GET('empresaLabora'),
             $data->__GET('telefono'),
             $data->__GET('cargoEmpresa'),
             $data->__GET('ingresoMensual'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarFiador (Fiador $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Fiador (nombreFiador,RelacionDeudor,nacionalidad,tipoIdentificacionFiador,numIdFiador
								,paisEmision,correoFiador,celularFiador,direccionFiador,paisDomicilioFiador,telefonoFiador
								,EmpresaFiador,telefonoEmpresa,cargoFiador,ingresoMensualFiador,idPic)
		        	VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreFiador'),
             $data->__GET('RelacionDeudor'),
			 $data->__GET('nacionalidad'),
			 $data->__GET('tipoIdentificacionFiador'),
			 $data->__GET('numIdFiador'),
			 $data->__GET('paisEmision'),
			 $data->__GET('correoFiador'),
			 $data->__GET('celularFiador'),
			 $data->__GET('direccionFiador'),
			 $data->__GET('paisDomicilioFiador'),
			 $data->__GET('telefonoFiador'),
			 $data->__GET('EmpresaFiador'),
			 $data->__GET('telefonoEmpresa'),
			 $data->__GET('cargoFiador'),
			 $data->__GET('ingresoMensualFiador'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarReferencias (Referencias $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO Referencias (nombreReferencia,tipoIdentificacion,numeroIdentificacion,tiempoReferido,celular,telefono,LugarLabora,idPic )
		        	VALUES (?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('nombreReferencia'),
			 $data->__GET('tipoIdentificacion'),
			 $data->__GET('numeroIdentificacion'),
			 $data->__GET('tiempoReferido'),
			 $data->__GET('celular'),
			 $data->__GET('telefono'),
			 $data->__GET('LugarLabora'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarInfoInteresPN (InteresInfoPN $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO InteresInfoPN(idCategoriaOcupacional,idCatalogoOCGO,idCatalogo_Acti_Economica,idPaisACII,idDeptoACII,idBusquedaRes,idPic) 
		        	VALUES (?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idCategoriaOcupacional'),
			 $data->__GET('idCatalogoOCGO'),
			 $data->__GET('idCatalogo_Acti_Economica'),
			 $data->__GET('idPaisACII'),
			 $data->__GET('idDeptoACII'),
			 $data->__GET('idBusquedaRes'),
			 $data->__GET('idPic')));
			 
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


	
}