<?php
    class BeneficiariosFinales{
        private $idBeneficiariosFinales;
        private $nombreBeneFinales;
        private $ApellidosBeneFinales;
        private $nacionalidadBeneFinales;
        private $deptoNacionalidadBeneFinales;
        private $numIdBeneFinales;
        private $AccionesBeneFinales;
        private $idPic;
          
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>

