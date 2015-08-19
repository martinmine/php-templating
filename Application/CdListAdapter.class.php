<?php
require_once('MVC/ViewElement.class.php');
require_once('MVC/View.class.php');

/**
 * Class CdListViewAdapter Used to generate a list of a collection of CDs.
 *
 * @author Martin Storø Nyfløtt
 */
class CdListViewAdapter extends ViewElement
{
    private $cds;

    /**
     * Prepares to create a new view of a cd collection.
     * @param $cds Array of cds that will be displayed.
     */
    public function __construct($cds)
    {
        $this->cds = $cds;
    }

    /**
     * Creates a view for every cd in this list, then displays each view.
     */
    public function generateView()
    {
        foreach ($this->cds as $cd)
        {
            $view = new View('CdItem');
            $view->setValue('TITLE', $cd->getTitle());
            $view->setValue('ARTIST', $cd->getArtist());
            $view->setValue('GENRE', $cd->getGenre());
            $view->setValue('CREATION_YEAR', $cd->getCreationYear());
            $view->display();
        }
    }
}