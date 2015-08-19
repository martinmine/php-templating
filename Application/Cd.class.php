<?php
/**
 * A class for keeping information about a CD designed for the introductory
 * exercise in IMT2571.
 *
 * @author  Rune Hjelsvold
 * @version 1.0
 */
class Cd {
    /**
     * @var integer $id The CD's unique id.
     */
    protected $id;

    /**
     * @var string $title The title of the CD.
     */
    protected $title;

    /**
     * @var string $artist The CD artist name.
     */
    protected $artist;

    /**
     * @var string $genre The CD's music genre.
     */
    protected $genre;

    /**
     * @var integer $creationYear The year the CD was created.
     */
    protected $creationYear;

    /**
     * Constructs a new CD using the passed values when initiating the member
     * variables.
     *
     * @param integer $id the CD's id (or -1 if no id has yet been assigned).
     * @param $title the title of the CD.
     * @param $artist the CD artist name.
     * @param $genre the name of the CD's music genre.
     * @param integer $creationYear the year the CD was created.
     */
    public function __construct($id, $title, $artist, $genre,
                                $creationYear)
    {
        $this->id = $id;
        $this->title = $title;
        $this->artist = $artist;
        $this->genre = $genre;
        $this->creationYear = $creationYear;
    }

    /**
     * Retrieves the CD's id.
     *
     * @return integer the CD's id.
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Retrieves the title of the CD.
     *
     * @return string the title of the CD.
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Retrieves the CD artist name.
     *
     * @return string the CD's artist name.
     */
    public function getArtist() {
        return $this->artist;
    }

    /**
     * Retrieves the CD's genre.
     *
     * @return string the CD's genre.
     */
    public function getGenre() {
        return $this->genre;
    }

    /**
     * Retrieves the year the CD was created.
     *
     * @return integer the year the CD was created.
     */
    public function getCreationYear() {
        return $this->creationYear;
    }

    /**
     * Sets the CD's id.
     *
     * @param integer $id the id.
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * Sets the CD's title.
     *
     * @param string $title the title.
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * Sets the CD artist name.
     *
     * @param string $artist the artist name.
     */
    public function setArtist($artist) {
        $this->artist = $artist;
    }

    /**
     * Sets the CD's music genre.
     *
     * @param string $genre the music genre.
     */
    public function setGenre($genre) {
        $this->genre = $genre;
    }

    /**
     * Sets the year the CD was created.
     *
     * @param integer $creationYear the creationYear.
     */
    public function setCreationYear($creationYear) {
        $this->creationYear = $creationYear;
    }

    /**
     * Implements PHP 5's magic __toString() method
     *
     * @return string a string encoding of the Cd object.
     */
    public function __toString() {
        return "id: {$this->id}, title: {$this->title}, artist: {$this->artist}, "
        . "genre: {$this->genre}, creation year: {$this->creationYear}";
    }
}