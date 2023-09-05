<?php
    class vw_AlertaMatrizEvaluacion{
        private $idMatrizRiesgoJuridico;
        private $nombre;
        private $id;
        private $fechaIngreso;
        private $origen;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>
,idCliente,cliente, productoSolicitado, riesgoCliente,tipoCliente,idEstado,proximaRevision,datediff(proximaRevision,now()) as "diasRestantes"