<?php
    class TipoPerJuridica{
        private $idTipoPerJuridica;
        private $tipoPersona;
        private $calificacion;
        private $idEstado;
          
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
