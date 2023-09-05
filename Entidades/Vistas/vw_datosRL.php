<?php
    class vw_datosRL{
        private $idPic;
        private $nombreRepresentanteLegal;
        private $paisNacimiento;
        private $nombre_paisNacimiento;
        private $deptoPaisNacimiento;
        private $nombre_deptoPaisNacimiento;
        private $nacionalidad;
        private $nombre_nacionalidad;
        private $deptoNacionalidad;
        private $nombre_deptoNacionalidad;
        private $tipoIdentificacion;
        private $numeroIdentificacion;
        private $paisEmision;
        private $nombre_paisEmision;
        private $fechaEmision;
        private $fechaVencimiento;
        private $paisResidencia;
        private $nombre_paisResidencia;
        private $deptoPaisResidencia;
        private $nombre_deptoPaisResidencia;
        private $celular;
        private $correo;
        private $cargo;
        private $profesion;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
