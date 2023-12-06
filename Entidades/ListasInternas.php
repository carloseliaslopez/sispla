<?php
    class ListasInternas{
        private $id_listas_riesgo;
        private $fechaIngreso;
        private $nombre;
        private $origen;
        private $razon;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
