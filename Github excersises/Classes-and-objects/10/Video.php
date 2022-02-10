<?php

class Video
{
    private string $title;
    private bool $checkedOut;
    private array $averageUserRating;

    public function __construct(string $title, array $averageUserRating = [], bool $checkedOut = false)
    {
        $this->title = $title;
        $this->averageUserRating = $averageUserRating;
        $this->checkedOut = $checkedOut;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getCheckout():bool
    {
        return $this->checkedOut;
    }
    public function checkOut():void
    {
        $this->checkedOut = !$this->checkedOut;
    }
    public function addRating(int $rating):void
    {
        $this->averageUserRating[] = $rating;
    }
    public function getRating():float
    {
        if (!empty($this->averageUserRating)) {
            $sum = array_sum($this->averageUserRating) / count($this->averageUserRating);
            $sum = round($sum, 1);
            return $sum;
        }
        return 0;
    }
}
