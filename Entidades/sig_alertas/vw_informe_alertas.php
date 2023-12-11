<?php
    class vw_informe_alertas{
        private $id_alertas_diarias;
        private $fecha;
        private $estado_señal;
        private $nombre_cliente;
        private $regla;
        private $monto;
        private $tipo_pago;
        private $origenes_fondo;
        private $actividad_comercial;
        private $plastico;
        private $pais_origen;
        private $pais_destino;
        private $contacto_cliente;
        private $solicitud_info;
        private $reporte_ros;
        private $fecha_proceso;
        private $acc_seguimiento;
        private $fecha_revision;
        private $oficina;

       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
 
