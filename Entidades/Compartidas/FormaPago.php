<?php
    class FormaPago{
        private $idFormaPago;
        private $nombreFormaPago;
        private $idEstado;
        private $riesgoFP;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
