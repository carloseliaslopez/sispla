<?php
    class CatalogoAE{
        private $idCatalogoAE;
        private $codigoCIIU;
        private $descripcionCIIU;
        private $idEstado;
               
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>