<?php
    class sig_datos_centrales{
        private $id_sig_datos_centrales;
        private $fecha;
        private $estado_señal;
        private $nombre_cliente;
        private $tipo_alerta;
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


