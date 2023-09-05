<?php
    class DatosClienteNaturalPic{
        private $idDatosClienteNaturalPic;
        private $fechaNacimiento;
        private $paisNacimiento;
        private $deptoPaisNacimiento;
        private $nacionalidad;
        private $deptoNacionalidad;
        private $idEstadoCivil;
        private $sexo;
        private $ndependientes;
        private $tipoIdentificacion;
        private $numIdentificacion;
        private $paisEmision;
        private $fechaEmision;
        private $fechaVencimiento;
        private $direccionDomicilio;
        private $PaisDomicilio;
        private $deptoPaisDomicilio;
        private $telefono;
        private $celular;
        private $correoPersonaNatural;
        private $profesion;
        private $idPic;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
