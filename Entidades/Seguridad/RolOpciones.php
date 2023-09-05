<?php
    class RolOpciones{
        private $idRolOpciones;
        private $idRol;
        private $idOpciones;
      
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
