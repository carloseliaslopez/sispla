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
