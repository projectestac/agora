<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.blockposition.php 27368 2009-11-02 20:19:51Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to display the welcome message
 *
 * Example
 * <!--[blockposition name=left]-->
 *
 * available parameters:
 * - name      name of the block position to display
 * - assign    if set, the title will be assigned to this variable
 * - implode   if set, the indiviual blocks in the position will be 'imploded' to a single string (default:true)
 *
 * @author       Mark West
 * @since        21/06/04
 * @see          function.blockposition.php::smarty_function_blockposition()
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      name         The name of the block position to render
 * @param        string      assign       Assign the output to template variable
 * @param        string      name         'implode' the output to a single string
 * @return       string      the output of the block position
 */
function smarty_function_blockposition($params, &$smarty)
{
    // fix the core positions for a better name
    if ($params['name'] == 'l') $params['name'] = 'left';
    if ($params['name'] == 'r') $params['name'] = 'right';
    if ($params['name'] == 'c') $params['name'] = 'center';

    if (!isset($params['name'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('blockposition', 'name')));
        return false;
    }

    $implode = (isset($params['implode']) && isset($params['assign'])) ? (bool)$params['implode'] : true;  

    $return = pnBlockDisplayPosition($params['name'], false, $implode);
    if (isset($params['assign'])) {
        $smarty->assign($params['assign'], $return);
    } else {
        return $return;
    }
}
