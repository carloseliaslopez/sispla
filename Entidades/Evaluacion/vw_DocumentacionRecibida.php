<?php
    class vw_DocumentacionRecibida{
        private $idDocumentacionRecibida;
        private $idCliente;
        private $idCatalogoDocumentos;
        private $productoSolicitado;
        private $comentario;
        private $descripcion;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
