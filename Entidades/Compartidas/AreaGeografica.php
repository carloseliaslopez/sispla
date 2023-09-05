<?php
    class AreaGeografica{
        private $idAreaGeografica;
        private $nombreAreaGeografica;
        private $idEstado;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
