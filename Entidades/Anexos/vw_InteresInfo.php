<?php
    class vw_InteresInfo{
        private $idInteresInfo;
        private $idTipoPerJuridica;
        private $tipoPersona;
        private $idConstitucion;
        private $fechaConstitucion;
        private $idCatalogoAE;
        private $descripcion;
        private $busqueda;
        private $idPaisAE;
        private $nombrePais;
        private $idDepto;
        private $nombreDepartamento;
        private $idPic;
         
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
