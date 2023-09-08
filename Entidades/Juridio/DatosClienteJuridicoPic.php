<?php
    class DatosClienteJuridicoPic{
        private $idDatosClienteJuridicoPic;
        private $paisConstitucion;
        private $deptoConstitucion;
        private $nombre_paisConstitucion;
        private $fechaConstitucion;
        private $fechaInscripcion;
        private $correoPersonaContacto;
        private $nombrePersonaContacto;
        private $cargoPersonaContacto;
        private $paginaWeb;
        private $telefono;
        private $idPic;
                                              
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

