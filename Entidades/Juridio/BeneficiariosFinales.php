<?php
    class BeneficiariosFinales{
        private $idBeneficiariosFinales;
        private $nombreBeneFinales;
        private $ApellidosBeneFinales;
        private $nacionalidadBeneFinales;
        //private $deptoNacionalidadBeneFinales;
        private $numIdBeneFinales;
        private $AccionesBeneFinales;
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
