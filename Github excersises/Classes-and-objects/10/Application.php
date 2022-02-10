<?php

class Application
{
    private VideoStore $store;
    private User $user;

    public function __construct()
    {
        $this->store = new VideoStore();
        $this->user = new User();
    }


    public function run()
    {
        while (true) {
            echo "Choose the operation you want to perform \n";
            echo "Choose 0 for EXIT\n";
            echo "Choose 1 to fill video store\n";
            echo "Choose 2 to rent video (as user)\n";
            echo "Choose 3 to return video (as user)\n";
            echo "Choose 4 to list inventory\n";

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!";
                    die;
                case 1:
                    $this->addMovies();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory();
                    break;
                default:
                    echo "Sorry, I don't understand you.." . PHP_EOL;
            }
        }
    }

    public function addMovies()
    {
        $title = readline("Movie title: ");
        $movie = new Video($title);
        $this->store->addVideo($movie);
    }

    public function rentVideo()
    {
        $title = readline("Movie title: ");
        $this->user->addVideo($this->store->checkOutVideo($title));
    }

    public function returnVideo()
    {
        $title = readline("Movie title: ");
        $rating = readline("Movie raiting 1-5: ");
        $this->store->returnVideo($this->user->returnVideo($title), $rating);
    }

    public function listInventory()
    {
        $inStore = "YES";
        $inventory = $this->store->getInventory();
        foreach ($inventory as $video) {
            if ($video->getCheckout()) {
                $inStore = "NO";
            }
            echo "Title: {$video->getTitle()} | Rating: {$video->getRating()} | In Store : {$inStore}" . PHP_EOL;
        }
    }

    public function testApp():void
    {
        $testApp = new VideoStoreTest();
        echo "-------------------------------------------------" . PHP_EOL;
        echo "Test: Adding a new video" . PHP_EOL;
        $testApp->testAddVideo();
        echo "-------------------------------------------------" . PHP_EOL;
        echo "Test: Adding ratings to videos" . PHP_EOL;
        $testApp->testAddRating();
        echo "-------------------------------------------------" . PHP_EOL;
        echo "Test: Renting and returning video" . PHP_EOL;
        $testApp->testRentReturn();
        echo "-------------------------------------------------" . PHP_EOL;
        echo "Test: Checking inventory after one rented video" . PHP_EOL;
        $testApp->testInventory();
    }
}
