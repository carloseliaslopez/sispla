<?php
    class ActividadNegocio{
        private $idActividadNegocio;
        private $nombreActividadNegocio;
        private $idEstado;
          
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
