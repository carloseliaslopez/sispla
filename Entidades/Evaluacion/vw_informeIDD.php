<?php
    class vw_informeIDD{
        private $idCliente;
        private $cliente;
        private $tipoCliente;
        private $productoSolicitado;
        private $paisMatriz;
        private $riesgoCliente;
        private $fechaRealizacion;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>


