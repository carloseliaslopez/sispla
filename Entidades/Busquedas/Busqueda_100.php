<?php
    class Busqueda_100{
        private $nombre;
        private $id;
        private $Relacion;
        private $origen;
      
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>