<?php
    class Proveedores{
        private $idProveedores;
        private $nombre;
        private $id;
        private $ubicacion;
        private $servicio;
        private $actividadEconomica;
        private $fechaIngreso;
        private $idEstado;
        private $origen;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>