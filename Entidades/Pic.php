<?php
    class Pic{
        private $idpic;
        private $fechaPic;
        private $nombreCliente;
        private $id;
        private $origen;
        private $categoria;
        private $fechaIngreso;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>