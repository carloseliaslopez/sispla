<?php
    class vw_oficinaRegla{
        private $idOficinaRegla;
        private $idOficina;
        private $nombreOficina;
        private $idRegla;      
        private $nombreRegla;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
