<?php
    class Pep{
        private $idPep;
        private $pep;
        private $nombrePep;
        private $nombre_idRelacionCliente;
        private $idRelacionCliente;
        private $nombreEntidad;
        private $PaisPep;
        private $nombre_PaisPep;
        private $cargo;
        private $perido;
        private $riesgoPep;
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
