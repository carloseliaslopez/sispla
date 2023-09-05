<?php
    class Monto{
        private $idMonto;
        private $descripcion;
        private $calificacion;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
