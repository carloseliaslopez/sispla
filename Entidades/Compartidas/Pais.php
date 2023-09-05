<?php
    class Pais{
        private $idPais;
        private $nombrePais;
        private $calificacion;
        private $idEstado;
         
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
