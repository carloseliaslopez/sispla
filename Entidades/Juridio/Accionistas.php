<?php
    class Accionistas{
        private $idAccionistas;
        private $nombreCompletoAccionistas;
        private $nacionalidadAccionistas;
        private $deptoNacionalidadAccionistas;
        private $numIdAccionistas;
        private $Acciones;
        private $idPic;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
