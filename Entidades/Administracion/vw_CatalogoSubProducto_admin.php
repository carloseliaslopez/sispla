<?php
    class vw_CatalogoSubProducto_admin{
        private $idCatalogoSubProducto;
        private $nombreSubProducto;
        private $idCategoriaProducto;
        private $nombreCategoriaProducto;
        private $riesgoSubProducto;
        private $idEstado;
       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>

