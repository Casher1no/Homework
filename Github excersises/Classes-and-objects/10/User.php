<?php

class User
{
    private array $movies;

    public function addVideo(?Video $video):void
    {
        $this->movies[] = $video;
    }
    public function getVideos():array
    {
        return $this->movies;
    }
    public function returnVideo(string $title):?Video
    {
        foreach ($this->movies as $key => $video) {
            if ($video->getTitle() == $title) {
                $movie = $video;
                unset($this->movies[$key]);
                return $movie;
            }
        }
        echo "Wrong title." . PHP_EOL;
        return null;
    }
}
