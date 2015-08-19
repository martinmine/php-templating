<?php
require_once('MyDb.php');
require_once('Cd.class.php');

/**
 * The class for interfacing the CD content of the introductory exercise
 * database in IMT2571, fall 2013. The database is accessed through PDO.
 *
 * @author  Rune Hjelsvold
 * @version 1.0
 * @uses MyDB
 * @uses Cd
 */
class CdModel
{
    /**
     * @var PDO The database object connected to the sample database.
     */
    protected $db;

    /**
     * Constructs a new CdModel object.
     *
     * @throws PDOException
     */
    public function __construct()
    {
        $this->db = openDB();
    }

    /**
     * This function generates an array of CD objects - one object for each CD
     * defined in the database. A PDOException will be thrown if the database
     * operation fails.
     *
     * @return Cd[] An array of Cdobjects - one object for each CD defined
     *         in the database
     * @uses Cd
     * @throws PDOException
     */
    public function getCdList()
    {
        $res = array();
        $stmt = $this->db->prepare(
            "SELECT id, title, artist, genre, creationYear "
            . "FROM cd");
        $stmt->execute();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $res[] = new Cd($row['id'], $row['title'],
                $row['artist'], $row['genre'],
                $row['creationYear']);
        }
        return $res;
    }

    /**
     * Adds data about a new CD in the library to the database
     *
     * @param Cd $cd A CD object representing the data to be added to the database.
     *
     * @return integer The new ID of the cd in the database.
     * @throws PDOException
     */
    public function addCd($cd)
    {
        $stmt = $this->db->prepare("INSERT INTO cd "
            . "(title, artist, genre, creationYear) "
            . "VALUES(:title, :artist, :genre, :year)");
        $stmt->execute(array(':title' => $cd->getTitle(),
            ':artist' => $cd->getArtist(),
            ':genre' => $cd->getGenre(),
            ':year' => $cd->getCreationYear()));
        return $this->db->lastInsertId();
    }
}