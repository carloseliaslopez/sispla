<?php
    class ComboAreaGeografica{
        private $idAreaGeografica;
        private $nombreAreaGeografica;
       
        public function __GET($k){ return $this->$k; }
	    public function __SET($k, $v){ return $this->$k = $v; }
    }

?>