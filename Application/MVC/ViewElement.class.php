<?php

/**
 * Every view that shall be displayed in a template file implements this interface.
 *
 * @author Martin Storø Nyfløtt
 */
abstract class ViewElement
{
    /**
     * Overrides PHP's 'magic' toString function in such a way that classes implementing this class
     * can be added as values to each view. When the view attempts to echo the value, this function
     * is called, which would then make the view for this class appear.
     */
    public function __toString()
    {
        $this->generateView();
        return '';
    }
    
    /**
     * Generates the HTML content of the web page element and displays it.
     */
    public abstract function generateView();
}