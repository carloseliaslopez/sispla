<?php
    class alertas_diarias{
        private $id_alertas_diarias;
        private $nombre_cliente;
        private $plastico;
        private $fecha_proceso;
        private $monto;
        private $regla;
        private $oficina;
        private $estado_regla;
        private $idEstado;
        private $cod_alert_temp;
    
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



