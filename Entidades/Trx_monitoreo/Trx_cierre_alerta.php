<?php
    class Trx_cierre_alerta{
        private $idCierreAlerta;
        private $metodoPago;
        private $origenFondo;
        private $actComercial;
        private $contactoCliente;
        private $reporteROS;
        private $obsSeguimiento;
        private $FechaRevision;
        private $codRegla;

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
