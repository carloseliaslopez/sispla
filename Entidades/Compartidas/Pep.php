<?php
    class Pep{
        private $idPep;
        private $pep;
        private $nombrePep;
        private $nombre_idRelacionCliente;
        private $idRelacionCliente;
        private $nombreEntidad;
        private $PaisPep;
        private $nombre_PaisPep;
        private $cargo;
        private $perido;
        private $idPic;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
