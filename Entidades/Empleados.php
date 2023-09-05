<?php
    class Empleados{
        private $idEmpleados;
        private $nombre;
        private $ubicacion;
        private $nombreEmpresa;
        private $areaLaboral;
        private $puesto;
        private $fechaIngreso;
        private $idEstado;
        private $origen;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
