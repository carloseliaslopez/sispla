<?php
    class vw_DatosClienteNaturalPic{
        private $idDatosClienteNaturalPic;
        private $fechaNacimiento;
        private $paisNacimiento;
        private $nombre_paisNacimiento;
        private $deptoPaisNacimiento;
        private $nombre_deptoPaisNacimiento;
        private $nacionalidad;
        private $nombre_nacionalidad;
        private $deptoNacionalidad;
        private $nombre_deptoNacionalidad;
        private $idEstadoCivil;
        private $nombre_idEstadoCivil;
        private $sexo;
        private $ndependientes;
        private $tipoIdentificacion;
        private $numIdentificacion;
        private $paisEmision;
        private $nombre_paisEmision;
        private $fechaEmision;
        private $fechaVencimiento;
        private $direccionDomicilio;
        private $PaisDomicilio;
        private $nombre_PaisDomicilio;
        private $deptoPaisDomicilio;
        private $nombre_deptoPaisDomicilio;
        private $telefono;
        private $celular;
        private $correoPersonaNatural;
        private $profesion;
        private $idPic;
       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
