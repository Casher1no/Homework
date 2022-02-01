<?php
class Movie
{
    private string $title;
    private string $studio;
    private string $rating;

    public function __construct(string $title, string $studio, string $rating)
    {
        $this->title = $title;
        $this->studio = $studio;
        $this->rating = $rating;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getStudio(): string
    {
        return $this->studio;
    }
    public function getRating(): string
    {
        return $this->rating;
    }
}

$allMovies = [];
$pgMovies = [];

$allMovies[] = movieDisk("Casino Royale", "Eon Production", "PG13", $allMovies);
$allMovies[] = movieDisk("Glass", "Buena Vista International", "PG13", $allMovies);
$allMovies[] = movieDisk("Spider-Man", "Columbia Pictures", "PG", $allMovies);

$pgMovies = getPG($allMovies);
var_dump($pgMovies);

function getPG(array $movies):array
{
    $PG =[];
    foreach ($movies as $movie) {
        if ($movie->getRating() == "PG") {
            $PG[] = $movie;
        }
    }
    return $PG;
}

function movieDisk(string $title, string $studio, string $rating): Movie
{
    $movie = new Movie($title, $studio, $rating);
    return $movie;
}
