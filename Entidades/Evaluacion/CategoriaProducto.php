<?php
    class CategoriaProducto{
        private $idCategoriaProducto;
        private $nombreCategoriaProducto;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
