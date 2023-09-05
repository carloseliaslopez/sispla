<?php
    class vw_RolUsuario{
        private $idRolUsuario;
        private $idUsuario;
        private $idRol;
        private $rolDescripcion;
        private $usuario;
        private $pwd;
        private $nombres;
        private $apellidos;
        private $correo;
        private $idEstado;       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
