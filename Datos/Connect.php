<?php
class Conexion
{
    // Atributos
    private $pdo;
    private $pdoStmt;
    private $serverName;
    private $dbName;
    private $userName;
    private $pwd;
     // METODOS DE CONEXION A LA BD
    // Metodos
    //$conexion = new mysqli('localhost','admin','adminCump123.','sispla');
    public function conectar()
	{
        $serverName = 'localhost';
        $dbName = 'sispla';
        $userName = 'admin';
        $pwd = 'adminCump123.';
        
		try
		{
            
			$this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            return $this->pdo; 	
            echo "Se conecto de BD exitosamente!";
		}
		catch(PDOException $e)
		{
            echo "La conexion fallo!";
			die($e->getMessage());
		}
        
    }

    public function desconectar()
    {
        try
		{
            $pdo = null;
           echo "Se desconecto de BD exitosamente!";
            return $pdo; 		        
        }
        catch(PDOException $e)
		{
            echo "ERROR: ";
			die($e->getMessage());
		}
    }

}
$con = new Conexion ();
$con->conectar();
?>
