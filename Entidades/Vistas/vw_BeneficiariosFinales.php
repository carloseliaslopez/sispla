<?php
    class vw_BeneficiariosFinales{
        private $idBeneficiariosFinales;
        private $nombreBeneFinales;
        private $ApellidosBeneFinales;
        private $nacionalidadBeneFinales;
        private $nombre_nacionalidadBeneFinales;
        private $deptoNacionalidadBeneFinales;
        private $nombre_deptoNacionalidadBeneFinales;
        private $numIdBeneFinales;
        private $AccionesBeneFinales;
        private $idPic;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>

