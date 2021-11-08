<?php
require_once('../../database/db.php');
class Tool extends DB{
    private $name;
    private $description;

    public function __construct($name, $description){
        parent::__construct(); 
        $this->name = $name;
        $this->description = $description;
    }

    function set_name($name) {
        $this->name = $name;
    }

    function get_name() {
        return $this->name;
    }

    function set_description($description) {
        $this->description = $description;
    }
    function get_description() {
        return $this->description;
    }
}


?>