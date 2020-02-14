<?php

class Song
{
    private $id;
    private $title;
    private $artist_id;
    private $duration;


    public function __construct(int $id, string $title, int $artist_id, int $duration)
    {
        $this->id = $id;
        $this->title = $title;
        $this->artist_id = $artist_id;
        $this->duration = $duration;
    }


    public function getId()
    {
        return htmlentities($this->id);
    }


    public function getTitle()
    {
        return htmlentities($this->title);
    }


    public function getDuration()
    {
        return htmlentities($this->duration);
    }


    public function getArtistId()
    {
        return htmlentities($this->artist_id);
    }
}
