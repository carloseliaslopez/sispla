<?php
    class Trx_senial{
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
        private $idOficina;
        private $idEstadoAlerta;
    
        private $usuario_creacion;
        private $fecha_creacion;
        private $usuario_modificacion;
        private $fecha_modificacion;
        private $usuario_eliminacion;
        private $fecha_eliminacion;

       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
