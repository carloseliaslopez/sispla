

<?php
    class MatrizRiesgoJuridico{
        private $idMatrizRiesgoJuridico;
        private $cliente;
        private $lugarConstitucion;
        private $lugarNacimiento_RL;
        private $lugarNacionalidad_RL;
        private $lugarResidencia_RL;
        private $lugarNacionalidad_ACM;
        private $lugarNacionalidad_BFM;
        private $personalidadJuridica;
        private $fechaConstitucion;
        private $actividadEconomica;
        private $lugarActividadEconomica;
        private $resultadosBusquedas;
        private $condicionPEP;
        private $productoSolicitado;
        private $monto;
        private $formaPago;
        private $origenRecursos;
        private $riesgoCliente;
        private $fechaRealizacion;
        private $tipoCliente;
        private $paisMatriz;
        private $idCliente;
        private $idEstado;
        private $proximaRevision;
                                               
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

