<?php
    class FuenteFondos{
        private $idFuenteFondos;
        private $nombreFuenteFondos;
        private $idEstado;
        private $riesgoFF;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
