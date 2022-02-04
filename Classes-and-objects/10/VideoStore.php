<?php

class VideoStore
{
    private array $inventory;

    public function getInventory():array
    {
        return $this->inventory;
    }

    public function addVideo(Video $video):void
    {
        $this->inventory[] = $video;
    }

    public function checkOutVideo(string $title):?Video
    {
        foreach ($this->inventory as $video) {
            if ($video->getTitle()==$title && !$video->getCheckout()) {
                $video->checkOut();
                return $video;
            }
        }
        echo "Wrong title or video is not in shop!" . PHP_EOL;
        return null;
    }
    public function returnVideo(Video $video, int $rating):void
    {
        foreach ($this->inventory as $originalVideo) {
            if ($originalVideo->getTitle()==$video->getTitle()) {
                $video->checkOut();
                $video->addRating($rating);
            }
        }
    }
}
