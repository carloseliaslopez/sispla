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
        private $inputRiesgo;
        private $idEstado;
                
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
