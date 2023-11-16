<?php
include_once("Connect.php");

class DtDataPicCompartidos extends Conexion
{
    private $myCon;
 
	public function registrarOrigenesFondos(OrigenesFondos $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO origenesfondos (idPic,idFormaPago,idFuenteFondos,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idPic'),
			 $data->__GET('idFormaPago'),
			 $data->__GET('idFuenteFondos'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	public function registrarFullPep(Pep $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO pep (pep,nombrePep,idRelacionCliente,nombreEntidad,PaisPep,cargo,perido,riesgoPep,idPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('pep'),
			 $data->__GET('nombrePep'),
			 $data->__GET('idRelacionCliente'),
			 $data->__GET('nombreEntidad'),
			 $data->__GET('PaisPep'),
			 $data->__GET('cargo'),
			 $data->__GET('perido'),
			 $data->__GET('riesgoPep'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
	

	public function registrarFullFacta(Facta $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO facta (Facta,nombreFacta,idRelacionCliente,idCausa,idPic,usuario_creacion,fecha_creacion)
		        	VALUES (?,?,?,?,?,?,current_timestamp())";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('Facta'),
			 $data->__GET('nombreFacta'),
			 $data->__GET('idRelacionCliente'),
			 $data->__GET('idCausa'),
			 $data->__GET('idPic'),
			 $data->__GET('usuario_creacion')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	



	public function OrigenesFondos($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_origenesfondos  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new OrigenesFondos();

				$emp->__SET('idFormaPago', $r->idFormaPago);	
				$emp->__SET('nombre_idFormaPago', $r->nombre_idFormaPago);
				$emp->__SET('idFuenteFondos', $r->idFuenteFondos);	
				$emp->__SET('nombre_idFuenteFondos', $r->nombre_idFuenteFondos);

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

	public function DatosPep($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_pep  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Pep();

				$emp->__SET('pep', $r->pep);	
				$emp->__SET('nombrePep', $r->nombrePep);
				$emp->__SET('idRelacionCliente', $r->idRelacionCliente);
				$emp->__SET('nombre_idRelacionCliente', $r->nombre_idRelacionCliente);
				$emp->__SET('nombreEntidad', $r->nombreEntidad);
				$emp->__SET('PaisPep', $r->PaisPep);
				$emp->__SET('nombre_PaisPep', $r->nombre_PaisPep);
				$emp->__SET('cargo', $r->cargo);
				$emp->__SET('perido', $r->perido);	

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

	public function DatosFacta($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_facta  WHERE idPic = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Facta();

				$emp->__SET('facta', $r->facta);	
				$emp->__SET('nombreFacta', $r->nombreFacta);
				$emp->__SET('idRelacionCliente', $r->idRelacionCliente);
				$emp->__SET('nombre_idRelacionCliente', $r->nombre_idRelacionCliente);
				$emp->__SET('idCausa', $r->idCausa);
				$emp->__SET('nombre_idCausa', $r->nombre_idCausa);

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
	
	public function editarOrigenesFondos(OrigenesFondos $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE origenesfondos SET
					idFormaPago= ?,
					idFuenteFondos=?
					WHERE idPic = ? ";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 
			 $data->__GET('idFormaPago'),
			 $data->__GET('idFuenteFondos'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarFullPep(Pep $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE pep SET
				pep = ?, nombrePep = ?, idRelacionCliente = ?,
				nombreEntidad = ?, PaisPep = ?, cargo = ?,
				perido = ?, riesgoPep =? 
				WHERE idPic = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('pep'),
			 $data->__GET('nombrePep'),
			 $data->__GET('idRelacionCliente'),
			 $data->__GET('nombreEntidad'),
			 $data->__GET('PaisPep'),
			 $data->__GET('cargo'),
			 $data->__GET('perido'),
			 $data->__GET('riesgoPep'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function editarFullFacta(Facta $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE facta SET
				Facta = ?,
				nombreFacta = ?,
				idRelacionCliente = ?,
				idCausa = ?
				WHERE idPic = ?";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('Facta'),
			 $data->__GET('nombreFacta'),
			 $data->__GET('idRelacionCliente'),
			 $data->__GET('idCausa'),
			 $data->__GET('idPic')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	
}