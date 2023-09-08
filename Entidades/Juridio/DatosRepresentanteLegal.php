<?php
    class DatosRepresentanteLegal{
        private $idDatosRepresentanteLegal;
        private $nombreRepresentanteLegal;
        private $paisNacimiento;
        private $deptoPaisNacimiento;
        private $nacionalidad;
        private $deptoNacionalidad;
        private $tipoIdentificacion;
        private $numeroIdentificacion;
        private $paisEmision;
        private $fechaEmision;
        private $fechaVencimiento;
        private $paisResidencia;
        private $deptoPaisResidencia;
        private $celular;
        private $correo;
        private $cargo;
        private $profesion;
        private $idPic;
                
        private $usuario_creacion;
        private $fecha_creacion;
        private $usuario_modificacion;
        private $fecha_modificacion;
        private $usuario_eliminacion;
        private $fecha_eliminacion;
 
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>


