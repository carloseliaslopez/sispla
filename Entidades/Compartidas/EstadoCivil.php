<?php
    class EstadoCivil{
        private $idEstadoCivil;
        private $descripcion;
        private $idEstado;
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>



CREATE TABLE (
 int auto_increment not null primary key,
 varchar(25)not null,
 int,
foreign key (idEstado) references Estado(idEstado)
);