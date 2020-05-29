<?php
    class Cliente
    {
        private $cod;
        private $nom;
        private $ape;
        private $dir;
        private $fnac;
        private $sex;
        
        public function __GET($k){
            return $this->$k;
        }
        public function __SET($k,$v){
            return $this->$k = $v;
        }
    }
?>