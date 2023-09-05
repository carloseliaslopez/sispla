<?php
    class vw_InteresInfoPN{
        private $idInteresInfoPN;
        private $idCategoriaOcupacional;
        private $tipoCategoria;
        private $riesgo_CatOcup;
        private $idCatalogoOCGO;
        private $codigoCGO;
        private $descripcionCGO;
        private $riesgoCGO;
        private $idCatalogo_Acti_Economica;
        private $codigoCIIU;
        private $descripcion;
        private $riesgo_AC;
        private $idPaisACII;
        private $nombrePais;
        private $riesgo_Pais;
        private $idDeptoACII;
        private $nombreDepartamento;
        private $riesgo_Depto;
        private $idBusquedaRes;
        private $busqueda;
        private $riesgo_Busqueda;
        private $idPic;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
