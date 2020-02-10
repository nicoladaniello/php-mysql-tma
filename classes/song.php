<?php

class Song {
    protected $id;
    protected $title;
    protected $artist_id;
    protected $duration;
    
    public function __construct($id, $title, $artist_id, $duration) {
        $this->id = $id;
        $this->title = $title;
        $this->artist_id = $artist_id;
        $this->duration = $duration;
    }
    
    public function getTitle() {
        return $this->title;
    }
    
    public function getDuration() {
        return $this->duration;
    }
}

?>