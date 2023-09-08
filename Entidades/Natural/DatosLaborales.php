<?php
    class DatosLaborales{
        private $nombreEmpresa;
        private $cargoEmpresa;
        private $fechaIngreso;
        private $antiguedad;
        private $direccionEmpresa;
        private $paisEmpresa;
        private $nombre_paisEmpresa;
        private $telefono;
        private $salarioMensual;
        private $otrosIngresos;
        private $egresosMensuales;
        private $fuenteOtrosIngresos;
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
