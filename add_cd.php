<?php
require_once('Application/MVC/View.class.php');
require_once('Application/CdModel.class.php');

/**
 * This controller will receive user input data for adding a new cd. If there was an HTTP POST and the user
 * specified all the fields, the cd will be added and the user will be redirected to cd_library.php.
 * In the event of a database error, the view will display a message saying that there is a database problem.
 * If there was an HTTP POST but the fields were not specified, there will be displayed a message for the user
 * specifying that they need to fill in all the fields.
 *
 * @author Martin Storø Nyfløtt
 * @version 1.0
 * @uses View
 * @uses CdModel
 * @uses Cd
 */

$view = new View('AddCdForm');

if (!empty($_POST['title']) && !empty($_POST['artist'])
    && !empty($_POST['genre']) && is_numeric($_POST['creationYear']))
{
    $cd = new Cd(0, $_POST['title'], $_POST['artist'], $_POST['genre'], $_POST['creationYear']);

    try
    {
        $model = new CdModel();
        $model->addCd($cd);

        header('Location: cd_library.php');
        exit;
    }
    catch (PDOException $e)
    {
        $view->setValue('MSG', 'Database error, please contact admin.');
    }
}
else if (count($_POST) > 0)
{
    $view->setValue('MSG', 'Please fill in all the fields');
}

$view->display();