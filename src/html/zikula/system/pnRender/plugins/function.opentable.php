<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.opentable.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to return the html code for opentable() located in theme.php.
 *
 * This function returns the html code for opentable() for
 * old style theme compatibility.
 *
 * Available parameters:
 *   - none
 *
 *
 * @author       Martin Andersen, Sebastian Schürmann
 * @since        28/04/2005
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the html code for opentable() located in theme.php
 */
function smarty_function_opentable($params, &$smarty)
{
    OpenTable();
}
