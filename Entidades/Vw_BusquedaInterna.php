<?php
    class Vw_BusquedaInterna{
        
        private $nombre;
        private $id;
        private $fechaIngreso;
        private $origen;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>