<?php
    class PrincipalesProveedores{
        private $idPrincipalesProveedores;
        private $nombreProveedor;
        private $servicio;
        private $domicilio;
        private $telefono;
        private $idPic;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
