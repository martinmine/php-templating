<?php
require_once('Application/MVC/View.class.php');
require_once('Application/CdListAdapter.class.php');
require_once('Application/CdModel.class.php');

/**
 * Controller for displaying the entire cd library. Creates a view with the amount of stored cd-items in addition
 * to a CdListViewAdapter which will build up the list of all the Cds for the view.
 * If there was a database error, the view will display this error.
 *
 * @author Martin Storø Nyfløtt
 * @uses View
 * @uses CdModel
 * @uses CdListViewAdapter
 */

$view = new View('CdLibrary');

try
{
    $model = new CdModel();
    $cdList = $model->getCdList();
    $view->setValue('STATISTICS', count($cdList));
    $view->setValue('CD_TABLE', new CdListViewAdapter($cdList));
}
catch (PDOException $e)
{
    $view->setValue('CD_TABLE', 'Database error, contact admin pls');
}

$view->display();