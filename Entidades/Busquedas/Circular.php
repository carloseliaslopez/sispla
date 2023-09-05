<?php
    class Circular{
        private $idCircular;
        private $fechaBusqueda;
        private $referencia;
        private $subOrganismo;
        private $idOrganismo;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
