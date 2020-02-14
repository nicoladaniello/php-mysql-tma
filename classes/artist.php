<?php

class Artist {
    private $id;
    private $name;
    

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    
    public function getId() {
        return htmlentities($this->id);
    }
    
    
    public function getName() {
        return htmlentities($this->name);
    }
}
