<?php
    class vw_Accionistas{
        private $idPic;
        private $nombreCompletoAccionistas;
        private $nacionalidadAccionistas;
        private $nombre_nacionalidadAccionistas;
        private $deptoNacionalidadAccionistas;
        private $nombre_deptoNacionalidadAccionistas;
        private $numIdAccionistas;
        private $acciones;
          
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>










