<?php
    class Riesgo_Cat_Pais{
        private $idRiesgo_Cat_Pais;
        private $idCatalogoAE;
        private $idPais;
        private $calificacion_Cat_Pais;
               
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
