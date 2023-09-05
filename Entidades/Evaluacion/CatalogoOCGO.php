<?php
    class CatalogoOCGO{
        private $idCatalogoOCGO;
        private $codigoCGO;
        private $descripcionCGO;
        private $riesgoCGO;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
