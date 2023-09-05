<?php
    class ComboPic{
           private $fechaIngreso;
        
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }
?>