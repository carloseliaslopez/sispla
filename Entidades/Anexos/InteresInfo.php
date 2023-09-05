<?php
    class InteresInfo{
        private $idInteresInfo;
        private $idTipoPerJuridica;
        private $idConstitucion;
        private $idCatalogoAE;
        private $idBusquedaRes;
        private $idPaisAE;
        private $idDepto;
        private $idPic;
               
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
