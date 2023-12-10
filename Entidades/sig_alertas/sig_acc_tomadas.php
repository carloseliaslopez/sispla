<?php
    class sig_acc_tomadas{
        private $id_sig_acc_tomadas;
        private $contacto_cliente;
        private $solicitud_info;
        private $reporte_ros;
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

