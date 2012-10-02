<?php
/**
 * EZComments
 *
 * @copyright (C) EZComments Development Team
 * @link http://code.zikula.org/ezcomments
 * @version $Id: modifier.modified.php 631 2009-11-26 16:28:16Z herr.vorragend $
 * @license See license.txt
 */

/**
 * Smarty modifier format an issue date for an atom news feed
 * 
 * Example
 * 
 *   <!--[$MyVar|modified]-->
 * 
 * 
 * @author  Mark West
 * @author         Franz Skaaning
 * @since        02 March 2004
 * @param array    $string     the contents to transform
 * @return string   the modified output
 */
function smarty_modifier_modified($string)
{
    return strftime("%G-%m-%dT%H:%M:%S+01:00", strtotime($string));
}

