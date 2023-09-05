<?php
    class OrigenesFondos{
        private $idOrigenesFondos;
        private $idPic;
        private $idFormaPago;
        private $nombre_idFormaPago;
        private $idFuenteFondos;
        private $nombre_idFuenteFondos;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>

