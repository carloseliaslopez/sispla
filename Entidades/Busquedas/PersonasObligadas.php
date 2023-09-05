<?php
    class PersonasObligadas{
        private $idPersonasObligadas;
        private $nombre;
        private $identificacion;
        private $nacionalidad;
        private $idCircular;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>