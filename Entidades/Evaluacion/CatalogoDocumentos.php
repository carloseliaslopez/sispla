<?php
    class CatalogoDocumentos{
        private $idCatalogoDocumentos;
        private $descripcion;
        private $categoriaCatProducto;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
