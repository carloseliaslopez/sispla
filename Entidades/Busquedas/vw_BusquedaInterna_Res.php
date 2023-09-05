<?php
    class vw_BusquedaInterna_Res{
        private $idPersonasObligadas;
        private $nombre;
        private $identificacion;
        private $idCircular;
        private $busqueda;
        private $concidencia;
        private $origen;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>