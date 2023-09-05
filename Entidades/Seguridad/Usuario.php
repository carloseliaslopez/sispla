<?php
    class Usuario{
        private $idUsuario;
        private $usuario;
        private $pwd;
        private $nombres;
        private $apellidos;
        private $correo;
        private $idEstado;
        private $firt_time;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
