<?php
    class ComboPais{
        private $idPais;
        private $nombrePais;
       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>