<?php
    class sig_datos_generales{
        private $id_sig_datos_generales;
        private $monto;
        private $tipo_pago;
        private $origenes_fondo;
        private $actividad_comercial;
        private $plastico;
        private $pais_origen;
        private $pais_destino;
        private $id_alertas_diarias;

          
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
