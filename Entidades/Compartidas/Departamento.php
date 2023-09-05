<?php
    class Departamento{
        private $idDepartamento;
        private $nombreDepartamento;
        private $calificacion;
        private $idEstado;
        private $idPais;
          
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>

