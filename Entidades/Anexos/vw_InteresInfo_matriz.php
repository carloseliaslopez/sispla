<?php
    class vw_InteresInfo_matriz{
        private $idInteresInfo;
        private $idTipoPerJuridica;
        private $tipoPersona;
        private $riesgoTPJ;
        private $idConstitucion;
        private $fechaConstitucion; 
        private $riesgoC;
        private $idCatalogoAE;
        private $descripcionCIIU;
        private $idBusquedaRes;
        private $busqueda;
        private $riesgoBR;
        private $idPaisAE;
        private $nombrePais;
        private $riesgoP;
        private $idDepto;
        private $nombreDepartamento;
        private $riesgoD;
        private $idPic;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>