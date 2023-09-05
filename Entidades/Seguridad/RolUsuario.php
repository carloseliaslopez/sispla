<?php
    class RolUsuario{
        private $idRolUsuario;
        private $idUsuario;
        private $idRol;
      
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
