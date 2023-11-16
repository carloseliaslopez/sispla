<?php
include_once("Connect.php");

class DtMatrizEvaluacion extends Conexion
{
    private $myCon;
	public function ListarInformesIDD()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT fechaRevision, cliente, productoSolicitado, paisCliente,monto,ProximaRevision, riesgo,observaciones,idCliente FROM informegeneralidd ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new InformeGeneralIDD();
				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('fechaRevision', $r->fechaRevision);
				$emp->__SET('cliente', $r->cliente);
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('paisCliente', $r->paisCliente);
				$emp->__SET('monto', $r->monto);
				$emp->__SET('riesgo', $r->riesgo);
				$emp->__SET('observaciones', $r->observaciones);
				$emp->__SET('idCliente', $r->idCliente);
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

	public function ListarDocumentosIDD($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM vw_documentacionrecibida  WHERE idCliente = ? AND productoSolicitado = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a,$b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new vw_DocumentacionRecibida();

				$emp->__SET('idDocumentacionRecibida', $r->idDocumentacionRecibida);	
				$emp->__SET('idCliente', $r->idCliente);	
				$emp->__SET('idCatalogoDocumentos', $r->idCatalogoDocumentos);
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('comentario', $r->comentario);
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
	
	public function ListarControlesAplicados($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM controlesaplicados  WHERE idCliente = ? AND productoSolicitado = ?";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a,$b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new ControlesAplicados();

				$emp->__SET('idControlesAplicados', $r->idControlesAplicados);	
				$emp->__SET('idCliente', $r->idCliente);	
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('motorBusqueda', $r->motorBusqueda);
				$emp->__SET('registroMercantil', $r->registroMercantil);
				$emp->__SET('poderJudicial', $r->poderJudicial);
				$emp->__SET('intelichek', $r->intelichek);
				$emp->__SET('interpol', $r->interpol);
				$emp->__SET('fbi', $r->fbi);
				$emp->__SET('ofac', $r->ofac);
				$emp->__SET('listasConsoUNSC', $r->listasConsoUNSC);
				$emp->__SET('sancionesUE', $r->sancionesUE);
			
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


	public function CatalogoDocumentosJ()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCatalogoDocumentos, descripcion, categoriaCatProducto, idEstado FROM catalogodocumentos WHERE idEstado <> 3 AND categoriaCatProducto= 'Jurídico' ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoDocumentos();
				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idCatalogoDocumentos', $r->idCatalogoDocumentos);
				$emp->__SET('descripcion', $r->descripcion);
				$emp->__SET('categoriaCatProducto', $r->categoriaCatProducto);
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

	public function CatalogoDocumentosN()
	{
		try
		{
			$this->myCon = parent::conectar();
			$result = array();
			$querySQL = "SELECT idCatalogoDocumentos, descripcion, categoriaCatProducto, idEstado FROM catalogodocumentos WHERE idEstado <> 3 AND categoriaCatProducto= 'Natural' ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute();

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new CatalogoDocumentos();
				//_SET(CAMPOBD, atributoEntidad)			
				$emp->__SET('idCatalogoDocumentos', $r->idCatalogoDocumentos);
				$emp->__SET('descripcion', $r->descripcion);
				$emp->__SET('categoriaCatProducto', $r->categoriaCatProducto);
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

	
	public function obtenerClienteInforme($id,$prod)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM informegeneralidd WHERE idCliente = ? AND productoSolicitado = ? ";
			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($id,$prod));
			
				$r = $stm->fetch(PDO::FETCH_OBJ);

				$emp = new InformeGeneralIDD();

				//_SET(CAMPOBD, atributoEntidad)
				$emp->__SET('idInformeGeneralIDD', $r->idInformeGeneralIDD);	
				$emp->__SET('idCliente', $r->idCliente);	
				$emp->__SET('cliente', $r->cliente);
				$emp->__SET('tipoCliente', $r->tipoCliente);
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('paisCliente', $r->paisCliente);
				$emp->__SET('monto', $r->monto);
				$emp->__SET('fechaRevision', $r->fechaRevision);
				$emp->__SET('proximaRevision', $r->proximaRevision);
				$emp->__SET('riesgo', $r->riesgo);
				$emp->__SET('observaciones',nl2br($r->observaciones) );
				$emp->__SET('idEstado', $r->idEstado);
				$emp->__SET('inputRiesgo', $r->inputRiesgo);
							
			$this->myCon = parent::desconectar();
			return $emp;
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	/*APARTADO PARA GUARDAR EL INFORME IDD*/

	public function registrarInformesIDD(InformeGeneralIDD $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO informegeneralidd (idCliente,cliente,tipoCliente,productoSolicitado,paisCliente,monto,
			fechaRevision, ProximaRevision, riesgo, observaciones,idEstado,inputRiesgo) 
		        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idCliente'),
			 $data->__GET('cliente'),
			 $data->__GET('tipoCliente'),
			 $data->__GET('productoSolicitado'),
			 $data->__GET('paisCliente'),
			 $data->__GET('monto'),
			 $data->__GET('fechaRevision'),
			 $data->__GET('proximaRevision'),
			 $data->__GET('riesgo'),
			 $data->__GET('observaciones'),
			 $data->__SET('idEstado',1),
			 $data->__GET('inputRiesgo')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarDocIDD(DocumentacionRecibida $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO documentacionrecibida (idCliente, productoSolicitado, idCatalogoDocumentos,comentario) 
		        VALUES (?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idCliente'),
			 $data->__GET('productoSolicitado'),
			 $data->__GET('idCatalogoDocumentos'),
			 $data->__GET('comentario')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function registrarCtrlAplicados(ControlesAplicados $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO controlesaplicados (idCliente,productoSolicitado,motorBusqueda,registroMercantil, poderJudicial,intelichek,interpol,fbi,ofac,listasConsoUNSC,sancionesUE)
		        VALUES (?,?,?,?,?,?,?,?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idCliente'),
			 $data->__GET('productoSolicitado'),
			 $data->__GET('motorBusqueda'),
			 $data->__GET('registroMercantil'),
			 $data->__GET('poderJudicial'),
			 $data->__GET('intelichek'),
			 $data->__GET('interpol'),
			 $data->__GET('fbi'),
			 $data->__GET('ofac'),
			 $data->__GET('listasConsoUNSC'),
			 $data->__GET('sancionesUE')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}
	public function registrarDocExtra(DocumentacionExtra $data)
	{
		try 
		{
			$this->myCon = parent::conectar();
			$sql = "INSERT INTO documentacionextra (idCliente, productoSolicitado, documento,comentario) 
			VALUES (?,?,?,?)";

			$this->myCon->prepare($sql)
		     ->execute(array(
			 $data->__GET('idCliente'),
			 $data->__GET('productoSolicitado'),
			 $data->__GET('documento'),
			 $data->__GET('comentario')));
			
			$this->myCon = parent::desconectar();
		} 
		catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	public function ListarDocumentosExtras($a,$b)
	{
		try
		{
			$this->myCon = parent::conectar();
			$querySQL = "SELECT * FROM documentacionextra  WHERE idCliente = ? AND productoSolicitado = ? ";

			$stm = $this->myCon->prepare($querySQL);
			$stm->execute(array($a,$b));

			foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)
			{
				$emp = new DocumentacionExtra();
					
				$emp->__SET('idCliente', $r->idCliente);	
				$emp->__SET('productoSolicitado', $r->productoSolicitado);
				$emp->__SET('documento', $r->documento);
				$emp->__SET('comentario', $r->comentario);
				
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