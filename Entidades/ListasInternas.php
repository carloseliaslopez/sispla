<?php
    class ListasInternas{
        private $idListasInternas;
        private $nombre;
        private $origen;
        private $fechaIngreso;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>