<?php
    class catalogo_acti_economica{
        private $idCatalogo_Acti_Economica;
        private $codigoCIIU;
        private $descripcion;
        private $idPais;
        private $calificacion;
        private $idEstado;
        
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
