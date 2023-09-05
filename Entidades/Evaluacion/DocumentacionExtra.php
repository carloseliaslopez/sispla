<?php
    class DocumentacionExtra{
        private $idDocumentacionExtra;
        private $idCliente;
        private $productoSolicitado;
        private $documento;
        private $comentario;
       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
