<?php
    class ActividadEconomica{
        private $idActividadEconomica;
        private $nombreComercial;
        private $idTributaria;
        private $anios;
        private $domicilioComercial;
        private $paisDomicilio;
        private $departamento;
        private $paginaWeb;
        private $telefonoOficina;
        private $idAreaGeografica;
        private $idActividadNegocio;
        private $descripcion;
        private $ventasMensual;
        private $numEmpleados;
        private $numSucursales;
        private $grupoEconomico;
        private $indicar;
        private $idPic;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
