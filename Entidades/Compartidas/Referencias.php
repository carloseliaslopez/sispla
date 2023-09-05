<?php
    class Referencias{
        private $idReferencias;
        private $nombreReferencia;
        private $tipoIdentificacion;
        private $numeroIdentificacion;
        private $tiempoReferido;
        private $celular;
        private $telefono;
        private $LugarLabora;
        private $idPic;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>

