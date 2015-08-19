<?php
require_once('ViewElement.class.php');

/**
 * A set of templates names and template values to be displayed in the website which
 * the user shall see. Upon fetching of the template output, the template values are 
 * inserted into the template files.
 *
 * @author Martin Storø Nyfløtt
 */
class View
{
    /**
     * @var String The file name of the .tpl file associated with this view.
     */
    private $viewName;
    
    /**
     * An associative array of a key pair (key, value) for all the values/objects 
     * to be displayed in the page template.
     * @var Array Associative array of the key => value pair.
     */
    private $values;

    /**
     * Prepares a new view.
     * @param String $viewName The file name of the template file for this view.
     */
    public function __construct($viewName)
    {
        $this->viewName = $viewName;
        $this->values = array();
    }
    /**
     * Sets the value to be displayed on the website for example PAGE_TITLE.
     * @param string $key   The key for the value, eg. PAGE_TITLE.
     * @param string $value The value, for example 'Welcome!'.
     */
    public function setValue($key, $value)
    {
        $this->values[$key] = $value;
    }
    
    /**
     * Sets all the values defined in setValue and from the IPageControllers and
     * renders all the template files to the user output.
     */
    public function display()
    {
        foreach ($this->values as $key => $value)
        {
            if (is_string($value))
                $value = htmlentities($value);
            $$key = $value;
        }

        require('Application/Views/' . $this->viewName . '.tpl');
        echo "\n";
    }
}