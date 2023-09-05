<?php
    class vw_CatalogoAE{
        private $idRiesgo_Cat_Pais;
        private $idCatalogoAE;
        private $codigoCIIU;
        private $descripcionCIIU;
        private $idPais;
        private $nombrePais;
        private $calificacion_Cat_Pais;
        private $idEstado;
               
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
