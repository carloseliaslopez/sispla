<?php
    class vw_trx_alertas{
        private $idSenial;
        private $autorizacion;
        private $cliente;
        private $usuario;
        private $cuenta;
        private $fechaProceso;
        private $operacion;
        private $monto;
        private $codRegla;
        private $paisTrx;
        private $idRegla;
        private $nombreRegla;
        private $idOficina;
        private $nombreOficina;
        private $idEstadoAlerta;
        private $nombreEstado;
       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
