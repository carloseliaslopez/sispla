<?php
    class vw_DatosGenerales{
        private $idDatosClientePic;
        private $paisConstitucion;
        private $nombre_paisConstitucion;
        private $deptoConstitucion;
        private $nombreDepartamento;
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

