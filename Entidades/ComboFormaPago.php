<?php
    class ComboFormaPago{
        private $idFormaPago;
        private $nombreFormaPago;
       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>