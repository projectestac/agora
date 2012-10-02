<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c) 2004, Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.pnthemegetvar.php 27274 2009-10-30 13:49:20Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Template_Plugins
 * @subpackage Functions
 */

/**
 * Smarty function to get a colour definition from the theme
 *
 * This function returns the corresponding color define from the theme
 *
 * Available parameters:
 *   - name:    Name of the colour definition
 *   - default: If set, the default value to return if the variable is not set
 *   - assign:  If set, the results are assigned to the corresponding variable instead of printed out
 *
 * Example
 * <!--[pnthemegetvar name='bgcolor']-->
 *
 * @author       J�rg Napp
 * @since        16. Sept. 2003
 * @param        array       $params      All attributes passed to this function from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @return       string      the colour definition
 */
function smarty_function_pnthemegetvar($params, &$smarty)
{
    $assign  = isset($params['assign'])  ? $params['assign']  : null;
    $default = isset($params['default']) ? $params['default'] : null;
    $name    = isset($params['name'])    ? $params['name']    : null;

    if (!$name) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('pnthemegetvar', 'name')));
        return false;
    }

    $result = ThemeUtil::getVar($name, $default);

    if ($assign) {
        $smarty->assign($assign, $result);
    } else {
        return $result;
    }
}
