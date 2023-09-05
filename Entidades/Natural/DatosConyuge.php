<?php
    class DatosConyuge{
        private $idDatosConyuge;
        private $nombreConyugue;
        private $fechaNacimiento;
        private $paisNacimientoConyuge;
        private $nombre_paisNacimientoConyuge;
        private $nacionalidadConyuge;
        private $nombre_nacionalidadConyuge;
        private $numeroIdentificacion;
        private $tipoIdentificacion;
        private $paisEmision;
        private $nombre_paisEmision;
        private $profesion;
        private $celular;
        private $empresaLabora;
        private $telefono;
        private $cargoEmpresa;
        private $ingresoMensual;
        private $idPic;

        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>
