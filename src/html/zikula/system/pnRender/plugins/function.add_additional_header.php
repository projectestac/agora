<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.add_additional_header.php 27067 2009-10-21 17:20:35Z drak $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to add additional information to the <head> </head>
 * section of a Zikula document
 *
 * Available parameters:
 *   - header:   If set, the value is assigned to the global
 *               $additional_header array.  The value can be a single
 *               string or an array of strings.
 *
 * Example
 *   <!--[add_additional_header header='<title>This is the title</title>']-->
 *  OR
 *   <!--[add_additional_header header=$title]-->
 *
 * @author       Chris Miller
 * @since        14 August 2004
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the value of the last status message posted, or void if no status message exists
 */
function smarty_function_add_additional_header($args, &$smarty)
{
    if (!isset($args['header'])) {
        return;
    }

    global $additional_header;

    if (is_array($args['header'])) {
        foreach($args['header'] as $header) {
            $additional_header[] = $header;
      }
    } else {
        $additional_header[] = $args['header'];
    }

    return;
}
