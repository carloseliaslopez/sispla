<?php
    class vw_alertas{
        private $nombre_cliente;
        private $plastico;
        private $monto;
        private $regla;
        private $oficina;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>

, , , , 