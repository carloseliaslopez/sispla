<?php
    class Rol{
        private $idRol;
        private $rolDescripcion;
        private $idEstado;
      
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
