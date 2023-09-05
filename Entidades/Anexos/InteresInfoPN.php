<?php
    class InteresInfoPN{
        private $idInteresInfoPN;
        private $idCategoriaOcupacional;
        private $idCatalogoOCGO;
        private $idCatalogo_Acti_Economica;
        private $idPaisACII;
        private $idDeptoACII;
        private $idBusquedaRes;
          
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
