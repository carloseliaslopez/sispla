<?php
include_once("Connect.php");

class DtSeguridad extends Conexion
{
    private $myCon;
	

    public function listarUsuario()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idUsuario, usuario, pwd, nombres, apellidos, correo, idEstado from usuario where  idEstado<>3";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Usuario();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idUsuario', $r->idUsuario);	
				$emp->__SET('usuario', $r->usuario);	
				$emp->__SET('pwd', $r->pwd);
				$emp->__SET('nombres', $r->nombres);
				$emp->__SET('apellidos', $r->apellidos);
                $emp->__SET('correo', $r->correo);
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


	public function listarRol()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idRol, rolDescripcion, idEstado from rol where idEstado<>3";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Rol();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idRol', $r->idRol);	
				$emp->__SET('rolDescripcion', $r->rolDescripcion);	
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
	public function listarUsuarioRol()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idRolUsuario, idUsuario, idRol, rolDescripcion, usuario, pwd, nombres, apellidos, correo, idEstado from vw_rolusuario ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_RolUsuario();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idRolUsuario', $r->idRolUsuario);	
				$emp->__SET('idUsuario', $r->idUsuario);
				$emp->__SET('idRol', $r->idRol);
				$emp->__SET('usuario', $r->usuario);
				$emp->__SET('pwd', $r->pwd);
				$emp->__SET('nombres', $r->nombres);
				$emp->__SET('apellidos', $r->apellidos);
				$emp->__SET('correo', $r->correo);
				$emp->__SET('idEstado', $r->idEstado);
				$emp->__SET('rolDescripcion', $r->rolDescripcion);	

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
	public function ExisteRolUsuario($a, $b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM rolusuario WHERE idUsuario= ? AND idRol = ?;";
		
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a, $b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new RolUsuario();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idRolUsuario', $r->idRolUsuario);	
				$emp->__SET('idUsuario', $r->idUsuario);	
				$emp->__SET('idRol', $r->idRol);
                
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

	public function registrarRolUsuario(RolUsuario $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO rolusuario (idUsuario,idRol)
		        VALUES (?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idUsuario'),
             $data->__GET('idRol')
            ));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function actualizarRolUsuario(RolUsuario $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE rolusuario SET 
			idRol = ?
			WHERE idRolUsuario = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					
					$data->__GET('idRol'), 
                    $data->__GET('idRolUsuario')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}

	public function eliminarRol($id)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "DELETE FROM rolusuario WHERE idRolUsuario = ?;";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id));
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	

	public function registrarUsuario(Usuario $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO usuario(nombres,apellidos,usuario,correo, pwd, idEstado) VALUES (?,?,?,?,?,1)";
			
			$this->myCon->prepare($sql)
			->execute(array(
			$data->__GET('nombres'),
			$data->__GET('apellidos'),
			$data->__GET('usuario'),
			$data->__GET('correo'),
			$data->__GET('pwd')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function ExisteUsuario($a)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT idUsuario,usuario,pwd,nombres,apellidos,correo,idEstado FROM usuario WHERE usuario = ?  AND idEstado <>3;";
			
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new Usuario();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idUsuario', $r->idUsuario);	
				$emp->__SET('usuario', $r->usuario);	
				$emp->__SET('pwd', $r->pwd);
				$emp->__SET('nombres', $r->nombres);
				$emp->__SET('apellidos', $r->apellidos);
				$emp->__SET('correo', $r->correo);
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

	public function actualizarPwdUsuario(Usuario $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "UPDATE usuario SET pwd = ?, firt_time = ? WHERE idUsuario = ?";

				$this->myCon->prepare($sql)
			     ->execute(
				array(
					
					$data->__GET('pwd'),
					$data->__GET('firt_time'),  
                    $data->__GET('idUsuario')
					)
				);
				$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			var_dump($e);
			die($e->getMessage());
		}
	}


}