<?php
    class vw_estado_cliente{
        private $id_estado_cliente;
        private $idPic;
        private $nombreCliente;
        private $id;
        private $id_cat_estado_cliente;
        private $nombre_estado;
    
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
