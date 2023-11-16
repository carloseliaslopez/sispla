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
    public function conectar()
	{
        $serverName = '172.22.1.12';
        $dbName = 'sispla';
        $userName = 'localhost';
        $pwd = 'Cumpl1m1ento2023*';
       
		try
		{
            
			$this->pdo = new PDO("mysql:host={$serverName};dbname={$dbName}",$userName,$pwd);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
            return $this->pdo; 		        
		}
		catch(PDOException $e)
		{
            echo "La conexion fallo!";
			die($e->getMessage());
		}
        //echo "Se conecto de BD exitosamente!";
    }

    public function desconectar()
    {
        try
		{
            $pdo = null;
           //echo "Se desconecto de BD exitosamente!";
            return $pdo; 		        
        }
        catch(PDOException $e)
		{
            echo "ERROR: ";
			die($e->getMessage());
		}
    }

}


?>
