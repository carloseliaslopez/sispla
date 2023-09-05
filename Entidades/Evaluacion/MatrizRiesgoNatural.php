<?php
    class MatrizRiesgoNatural{
        private $idMatrizRiesgoNatural;
        private $cliente;
        private $lugarNacimiento;
        private $lugarNacionalidad;
        private $lugarResidencia;
        private $categoria;
        private $profesion;
        private $actividadEmpleo;
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
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
