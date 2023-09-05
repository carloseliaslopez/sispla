<?php
    class ControlesAplicados{
        private $idControlesAplicados;
        private $idCliente;
        private $productoSolicitado;
        private $motorBusqueda;
        private $registroMercantil;
        private $poderJudicial;
        private $intelichek;
        private $interpol;
        private $fbi;
        private $ofac;
        private $listasConsoUNSC;
        private $sancionesUE;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
