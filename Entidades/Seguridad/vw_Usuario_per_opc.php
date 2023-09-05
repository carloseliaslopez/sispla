<?php
    class vw_Usuario_per_opc{
        private $idRolUsuario;
        private $idUsuario;
        private $idRol;
        private $idOpciones;
        private $usuario;
        private $pwd;
        private $nombres;
        private $apellidos;
        private $correo;
        private $idEstado;
        private $rolDescripcion;
        private $opcionDescripcion;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
