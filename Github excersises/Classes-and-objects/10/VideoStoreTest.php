<?php

class VideoStoreTest
{
    private VideoStore $store;
    private array $user;


    public function __construct()
    {
        $this->store = new VideoStore();
    }

    public function testAddVideo():void
    {
        $this->store->addVideo(new Video("The Matrix", [4,3,4,4,2,5,4,3,4,3]));
        $this->store->addVideo(new Video("Godfather II", [2,3,3,2,3,4,2,3,3]));
        $this->store->addVideo(new Video("Star Wars Episode IV: A New Hope", [4,5,5,4,5,3,4,5,4,4]));
        
        foreach ($this->store->getInventory() as $video) {
            echo "Movie : {$video->getTitle()} Rating: {$video->getRating()}" . PHP_EOL;
        }
    }
    public function testAddRating():void
    {
        foreach ($this->store->getInventory() as $video) {
            echo "Movie: {$video->getTitle()}" . PHP_EOL;
            echo "Before" . PHP_EOL;
            echo $video->getRating() . PHP_EOL;
            $video->addRating(rand(1, 5));
            $video->addRating(rand(1, 5));
            $video->addRating(rand(1, 5));
            echo "After" . PHP_EOL;
            echo $video->getRating() . PHP_EOL;
            echo "================================================" . PHP_EOL;
        }
    }

    public function testRentReturn():void
    {
        //Rent test
        $this->user[] = $this->store->checkOutVideo("Godfather II");
        foreach ($this->store->getInventory() as $video) {
            if ($video->getTitle() == "Godfather II") {
                if ($video->getCheckout()) {
                    echo "Expected true : {$video->getCheckout()}" . PHP_EOL;
                }
            }
        }
        //Return test
        $this->store->returnVideo($this->user[0], 4);
        unset($this->user[0]);
        foreach ($this->store->getInventory() as $video) {
            if ($video->getTitle() == "Godfather II") {
                if (!$video->getCheckout()) {
                    echo "Expected empty : {$video->getCheckout()}" . PHP_EOL;
                }
            }
        }
    }
    
    public function testInventory():void
    {
        $this->user[] = $this->store->checkOutVideo("Godfather II");

        foreach ($this->store->getInventory() as $video) {
            if (!$video->getCheckout()) {
                echo "Movie: {$video->getTitle()} | In store: YES" . PHP_EOL;
            } else {
                echo "Movie: {$video->getTitle()} | In store: NO" . PHP_EOL;
            }
        }
    }
}
