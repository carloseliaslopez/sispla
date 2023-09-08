<?php
    class Fiador{
        private $idFiador;
        private $nombreFiador;
        private $RelacionDeudor;
        private $nacionalidad;
        private $nombre_nacionalidad;
        private $tipoIdentificacionFiador;
        private $numIdFiador;
        private $paisEmision;
        private $nombre_paisEmision;
        private $correoFiador;
        private $celularFiador;
        private $direccionFiador;
        private $paisDomicilioFiador;
        private $nombre_paisDomicilioFiador;
        private $telefonoFiador;
        private $EmpresaFiador;
        private $telefonoEmpresa;
        private $cargoFiador;
        private $ingresoMensualFiador;
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
