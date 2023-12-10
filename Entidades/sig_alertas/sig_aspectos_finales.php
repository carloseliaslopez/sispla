<?php
    class sig_aspectos_finales{
        private $id_sig_aspectos_finales;
        private $acc_seguimiento;
        private $fecha_revision;
        private $oficina;
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

