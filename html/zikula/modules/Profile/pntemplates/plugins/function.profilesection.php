<?php
/**
 * Zikula Application Framework
 *
 * @copyright (c), Zikula Development Team
 * @link http://www.zikula.org
 * @version $Id: function.profilesection.php 90 2010-01-25 08:31:41Z mateo $
 * @license GNU/GPL - http://www.gnu.org/copyleft/gpl.html
 * @package Zikula_Value_Addons
 * @subpackage Profile
 */

/**
 * Smarty function to display a section of the user profile
 *
 * Example
 * <!--[profilesection name='ezcomments']-->
 *
 * @author       Mateo Tibaquira
 * @param        array       $params      All parameters passed to this section from the template
 * @param        object      &$smarty     Reference to the Smarty object
 * @param        string      $name        Section name to render
 * @return       string      the user section
 */
function smarty_function_profilesection($params, &$smarty)
{
    // validation
    if (!isset($params['name']) || empty($params['name'])) {
        $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('profilesection', 'name')));
        return false;
    }
    if (!isset($params['uid']) || empty($params['uid'])) {
        $params['uid'] = $smarty->get_template_vars('uid');
        if (empty($params['uid'])) {
            $smarty->trigger_error(__f('Error! in %1$s: the %2$s parameter must be specified.', array('profilesection', 'uid')));
            return false;
        }
    }

    $params['name'] = strtolower($params['name']);

    // extract the items to list
    $section = pnModAPIFunc('Profile', 'section', $params['name'], $params);

    if ($section === false) {
        return '';
    }

    // build the output
    $render = & pnRender::getInstance('Profile', false, null, true);

    // check the tmeplate existance
    $template = "sections/profile_section_{$params['name']}.htm";

    if (!$render->template_exists($template)) {
        return '';
    }

    // assign and render the output
    $render->assign('section', $section);

    return $render->fetch($template, $params['uid']);
}
