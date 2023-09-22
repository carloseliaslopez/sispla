<?php
    class vw_consol_nombre{
        private $nombre;
        private $id;
        private $origen;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>