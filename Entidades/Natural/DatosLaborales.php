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

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>