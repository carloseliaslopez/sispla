<?php
    class Vw_BusquedaMensual{

        private $fechaIngreso;
        private $nombreCliente;
        private $PosibleCliente;
        private $origenC;
        private $Repreconyugue;
        private $PosibleRepresentante;
        private $origenRLC;
        private $accionistas;
        private $PosibleAccionista;
        private $origenABF;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>