<?php
    class Config {
        private $values = array();
        
        public function Config() {
            $this->set("run", true);
        }
        
        public function set($name, $value) {
            $this->values[$name] = $value;
        }
        
        public function get($name) {
            return $this->values[$name];
        }
        
        public function get_all() {
            return $this->values;
        }
    }
?>