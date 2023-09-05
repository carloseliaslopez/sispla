<?php
    class Facta{
        private $idFacta;
        private $facta;
        private $nombreFacta;
        private $idRelacionCliente;
        private $nombre_idRelacionCliente;
        private $idCausa;
        private $nombre_idCausa;
        private $idPic;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>

