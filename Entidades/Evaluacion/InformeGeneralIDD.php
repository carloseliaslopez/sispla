<?php
    class InformeGeneralIDD{
        private $idInformeGeneralIDD;
        private $idCliente;
        private $cliente;
        private $tipoCliente;
        private $productoSolicitado;
        private $paisCliente;
        private $monto;
        private $fechaRevision;
        private $proximaRevision;
        private $riesgo;
        private $observaciones;
        private $idEstado;
        private $inputRiesgo;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
