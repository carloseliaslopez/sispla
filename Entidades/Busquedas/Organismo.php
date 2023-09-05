<?php
    class Organismo{
        private $idOrganismo;
        private $nombreOrganismo;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
