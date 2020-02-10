<?php

class Artist {
    protected $id;
    protected $name;
    
    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getDuration() {
        return $this->duration;
    }
}

?>