<?php
    class DatosClienteJuridicoPic{
        private $idDatosClientePic;
        private $paisConstitucion;
        private $deptoConstitucion;
        private $nombre_paisConstitucion;
        private $fechaConstitucion;
        private $fechaInscripcion;
        private $correoPersonaContacto;
        private $nombrePersonaContacto;
        private $cargoPersonaContacto;
        private $telefono;
        private $idPic;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>